<?php

namespace App\Listeners;

use App\Models\File;
use App\Models\User;
use App\Events\FileDownload;
use App\Notifications\NewFileDownload;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUser
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
    public function handle(FileDownload $event): void
    {
        $file = $event->file;

        $user = User::where('id', $file->user_id)->get();

        Notification::send($user, new NewFileDownload($file));
    }
}
