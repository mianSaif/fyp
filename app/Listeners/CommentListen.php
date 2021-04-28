<?php

namespace App\Listeners;

use App\Events\CommentApp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentListen
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
     * @param  CommentApp  $event
     * @return void
     */
    public function handle(CommentApp $event)
    {
        //
    }
}
