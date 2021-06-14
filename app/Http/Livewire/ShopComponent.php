<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cart;

class ShopComponent extends Component
{
    public function store($product_id, $product_name, $product_price, $product_img)
    {
      Cart::add($product_id, $product_name, 1, $product_price, [$product_img])->associate('App\Models\Product');
      session()->flash('success_message', 'Da them vao gio hang');
      return redirect()->route('product.cart');
    }

    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component',[
            'products' => $products,
        ])->layout('layouts.base');
    }
}
