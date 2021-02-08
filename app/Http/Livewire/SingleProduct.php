<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\IdeaSubscription;
use App\Models\Product;
use App\Models\Vote;
use Livewire\Component;

class SingleProduct extends Component
{

    public $product;
    public $featureName;
    public $featureDesc;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function hydrate(){
        $this->product = Product::with('ideas.votes')->find($this->product->getKey());
    }

    public function render()
    {
        return view('livewire.single-product');
    }

    public function addNewIdea()
    {
        $idea = new Idea();
        $idea->title = $this->featureName;
        $idea->description = $this->featureDesc;
        $idea->product_id = $this->product->getKey();
        $idea->user_id = auth()->user()->getKey();
        $idea->save();

        $this->product->ideas[] = $idea;
        $this->featureDesc = $this->featureName = null;
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

        if( $idea ) {
            $sub = new IdeaSubscription();
            $sub->idea_id = $item;
            $sub->user_id = auth()->user()->getKey();
            $sub->save();
        }

        $this->hydrate();

    }

    public function navigateTo($idea){
        return redirect()->route('idea.show', [$idea]);
    }
}
