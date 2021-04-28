<?php

namespace App\Listeners;

use App\Events\ActiveChat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActiveChatListen
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
     * @param  ActiveChat  $event
     * @return void
     */
    public function handle(ActiveChat $event)
    {
        //
    }
}
