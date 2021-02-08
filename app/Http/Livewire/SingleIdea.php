<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\IdeaSubscription;
use App\Models\Product;
use App\Models\Vote;
use Livewire\Component;

class SingleIdea extends Component
{

    public $idea;

    public function mount(Idea $idea){
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.single-idea');
    }

    public function likeThis($item, $model)
    {

        if ($model === 'idea') {
            $idea = Vote::where('item_id', $item)
                ->where('item_type', Idea::class)
                ->where('user_id', auth()->user()->getKey())
                ->first();
            if ($idea instanceof Vote) {
                $idea->delete();
                return $item;
            }
        }

        if ($model === 'product') {
            $product = Vote::where('item_id', $item)
                ->where('item_type', Product::class)
                ->where('user_id', auth()->user()->getKey())
                ->first();
            if ($product instanceof Vote) {
                $product->delete();
                return $product;
            }
        }

        $vote = new Vote();
        $vote->item_id = $item;
        $vote->item_type = $model === 'idea' ? Idea::class : Product::class;
        $vote->user_id = auth()->user()->getKey();
        $vote->save();

        if( $idea )
        $sub = new IdeaSubscription();
        $sub->idea_id = $item;
        $sub->user_id = auth()->user()->getKey();
        $sub->save();

        $this->hydrate();

    }

    public function toggleSubscribed(Idea $idea){
        if( $idea->subscribed ){
            $remove = IdeaSubscription::where('user_id', auth()->user()->getKey())->where('idea_id', $idea->getKey())->delete();
        } else {
            $sub = new IdeaSubscription();
            $sub->user_id = auth()->user()->getKey();
            $sub->idea_id = $idea->getKey();
            $sub->save();
        }
    }

}
