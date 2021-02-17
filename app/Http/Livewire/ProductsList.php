<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewProductAdded;
use Livewire\Component;

class ProductsList extends Component
{

    public $products;
    public $newName;


    public function mount(){
        $this->products = Product::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.products-list');
    }

    public function addNewProduct(){
        $product = new Product();
        $product->name = $this->newName;
        $product->user_id = auth()->user()->getKey();
        $product->save();

        $this->products[] = $product;

        $this->newName = null;

        $users = User::get();
        foreach( $users as $user ){
            $user->notify(new NewProductAdded($product));
        }

        return redirect()->route('product.show', [$product->getKey()]);
    }

    public function redirectTo($product){
        return redirect()->route('product.show', ['product' => $product]);
    }

}
