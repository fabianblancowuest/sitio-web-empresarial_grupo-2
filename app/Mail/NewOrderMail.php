<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [
                new Address($this->order->user->email, $this->order->user->name),
            ],
            subject: 'Nuevo proyecto solicitado: ' . $this->order->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-order',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
