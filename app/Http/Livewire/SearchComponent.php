<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search;

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function render()
    {

        $productsAll = Product::where('name', 'like', '%' . $this->search . '%')->get();
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(12);

        return view('livewire.search-component', [
            'products' => $products,
            'productsAll' => $productsAll,
        ])->layout('layouts.base');
    }
}
