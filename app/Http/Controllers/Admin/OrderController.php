<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

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

        Order::create($request->all());
        return redirect()->route('admin.orders.index')->with('success', 'Pedido creado correctamente.');
    }

    public function edit(Order $order)
    {
        $clients = User::where('role', 'cliente')->get();
        return view('admin.orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'status'      => 'required|in:pendiente,en_progreso,completado,cancelado',
            'price'       => 'nullable|numeric',
            'deadline'    => 'nullable|date',
        ]);

        $order->update($request->all());
        return redirect()->route('admin.orders.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pedido eliminado correctamente.');
    }
}