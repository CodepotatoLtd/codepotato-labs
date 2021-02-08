<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use App\Notifications\NewCommentAdded;
use Livewire\Component;

class CommentThread extends Component
{

    public $idea;
    public $newMessage;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.comment-thread');
    }

    public function saveNewMessage()
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->getKey();
        $comment->idea_id = $this->idea->getKey();
        $comment->comment = $this->newMessage;
        $comment->save();

        $this->newMessage = null;
        $this->idea->comments[] = $comment;

        foreach ($this->idea->subscriptions as $subscription) {
//            if ($comment->user_id !== $subscription->user_id) {
                $subscription->user->notify(new NewCommentAdded($this->idea, $comment));
//            }
        }
    }
}
