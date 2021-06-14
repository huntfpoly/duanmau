<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Cart;


class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Da them vao gio hang');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        ;
        $product = Product::where('slug', $this->slug)->first();
        $popular_product = DB::table('products')
            ->whereNotIn('slug', [$this->slug])
            ->orderBy('count_view', 'desc')->limit(4)
            ->get();
        $relate_product = DB::table('products')
            ->where('category_id', $product->category_id)
            ->whereNotIn('slug', [$this->slug])
            ->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component', ['product' => $product, 'popular_product' => $popular_product, 'relate_product' => $relate_product])->layout('layouts.base');
    }
}
