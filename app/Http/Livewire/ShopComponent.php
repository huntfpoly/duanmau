<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    public function render()
    {
        $products = Product::paginate(12);
        $categories = Category::all();
        return view('livewire.shop-component',[
            'products' => $products,
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
