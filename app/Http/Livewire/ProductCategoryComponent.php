<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductCategoryComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $id_cate = Category::where('slug', $this->slug)->first();
        $products = Product::where('category_id', $id_cate->id)->paginate(12);
//        $products = Product::paginate(12);
//        dd($products_cate);
        return view('livewire.product-category-component', [
            'products_cate' => $products,
        ])->layout('layouts.base');
    }
}
