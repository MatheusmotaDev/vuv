<?php

namespace App\Notifications;

use App\Models\Quotation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuotation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Quotation $quotation)
    {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'quotation_id' => $this->quotation->id,
            'shipping_address' => $this->quotation->shipping_address,
            'quotation_name' => $this->quotation->name,
            'customer' => $this->quotation->costumer,
        ];
    }
}
