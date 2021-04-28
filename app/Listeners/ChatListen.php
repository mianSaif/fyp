<?php

namespace App\Listeners;

use App\Events\ChatApp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChatListen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChatApp  $event
     * @return void
     */
    public function handle(ChatApp $event)
    {
        //
    }
}
