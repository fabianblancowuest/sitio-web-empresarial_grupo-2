<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\Order;
use App\Models\OrderMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = User::where('role', 'cliente')->get();
        return view('admin.orders.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pendiente,en_progreso,completado,cancelado',
            'price'       => 'nullable|numeric',
            'deadline'    => 'nullable|date',
        ]);

        Order::create($request->only(['user_id', 'title', 'description', 'status', 'price', 'deadline']));
        return redirect()->route('admin.orders.index')->with('success', 'Pedido creado correctamente.');
    }

    public function show(Order $order)
    {
        $order->load('user', 'messages.user');
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = User::where('role', 'cliente')->get();
        return view('admin.orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pendiente,en_progreso,completado,cancelado',
            'price'       => 'nullable|numeric',
            'deadline'    => 'nullable|date',
        ]);

        $order->update($request->only(['user_id', 'title', 'description', 'status', 'price', 'deadline']));
        return redirect()->route('admin.orders.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pedido eliminado correctamente.');
    }

    public function message(Request $request, Order $order)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        OrderMessage::create([
            'order_id' => $order->id,
            'user_id'  => Auth::id(),
            'message'  => $request->message,
        ]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Respuesta enviada correctamente.');
    }

    public function status(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pendiente,en_progreso,completado,cancelado',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Estado actualizado correctamente.');
    }
}