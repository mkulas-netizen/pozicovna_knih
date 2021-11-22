<?php

namespace App\Listeners;

use App\Mail\BookEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendBookActionMail implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('test@bjs.sk')->send(new BookEmail($event->book));
    }
}
