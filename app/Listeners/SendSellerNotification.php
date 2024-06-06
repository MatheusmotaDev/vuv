<?php

namespace App\Listeners;

use App\Events\QuotationCreated;
use App\Models\User;
use App\Notifications\NewQuotation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSellerNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(QuotationCreated $event): void
    {
        foreach(User::where('role', 'seller')->cursor() as $seller) {
            $seller->notify(new NewQuotation($event->quotation));
        }
    }
}
