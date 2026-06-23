<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\Order;
use App\Models\OrderMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::with('messages.user')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('client.dashboard', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
        ]);

        $order = Order::create([
            'user_id'     => Auth::id(),
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status'      => 'pendiente',
        ]);

        $order->messages()->create([
            'user_id' => Auth::id(),
            'message' => $validated['description'] ?? 'Solicitud de proyecto: ' . $validated['title'],
        ]);

        Mail::to(config('mail.contact_to_address'))->send(new NewOrderMail($order));

        return redirect()->route('client.dashboard')
            ->with('success', 'Proyecto solicitado correctamente. Te contactaremos pronto.');
    }

    public function message(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        OrderMessage::create([
            'order_id' => $order->id,
            'user_id'  => Auth::id(),
            'message'  => $request->message,
        ]);

        return redirect()->route('client.dashboard')
            ->with('success', 'Mensaje enviado correctamente.');
    }
}