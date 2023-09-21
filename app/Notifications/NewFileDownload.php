<?php

namespace App\Notifications;

use App\Models\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewFileDownload extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected File $file)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database',
        // 'mail'
    ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $file = $this->file;

        return (new MailMessage)
                    ->line('New download to :file' , ['file'=> $file->name])
                    ->line('Total Download be :total' , ['total' => $file->total_download]);
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        $file = $this->file;

        return (new DatabaseMessage([
            'title' => 'New download to:file' , ['file'=> $file->name],
            'body' => 'Total Download be :total' , ['total' => $file->total_download],
        ]));

    }



    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
