<?php

namespace App\Listeners;

use App\Events\PostDeleted;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DecreasePostsCount
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
    public function handle(PostDeleted $event): void
    {
        $userId = $event->userId;
        User::find($userId)->update(['posts_count' => User::findOrFail($userId)->posts_count - 1]);
    }
}
