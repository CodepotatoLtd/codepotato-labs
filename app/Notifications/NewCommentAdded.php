<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentAdded extends Notification
{
    use Queueable;

    public $idea;
    public $comment;

    /**
     * NewCommentAdded constructor.
     * @param  Idea  $idea
     * @param  Comment  $comment
     */
    public function __construct(Idea $idea, Comment $comment)
    {
        $this->idea = $idea;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('👋 Hello again,')
                    ->line($this->comment->user->name . ' added a new comment to "' . $this->idea->title  . '"')
                    ->action('View comment', route('idea.show', [$this->idea]))
                    ->line('Thank you for being part of our community')
                    ->line('If you wish to unsubscribe from these notifications please log in to codepotato labs and unsubscribe from alerts on this idea.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
