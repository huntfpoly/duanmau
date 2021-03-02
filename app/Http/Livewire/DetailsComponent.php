<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug=$slug;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_product = DB::table('products')->inRandomOrder()->limit(4)->get();
        $relate_product = DB::table('products')->where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component', ['product' => $product, 'popular_product' => $popular_product, 'relate_product'=>$relate_product])->layout('layouts.base');
    }
}
