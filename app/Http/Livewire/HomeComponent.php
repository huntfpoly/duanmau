<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeComponent extends Component
{

    public function render()
    {
        $sliders = Slider::all();
        $sale_products = DB::table('products')->orderBy('sale_price', 'desc')->limit(10)->get();
        $new_products = DB::table('products')->orderBy('id', 'desc')->limit(10)->get();
        return view('livewire.home-component', [
            'sliders' => $sliders,
            'sale_products' => $sale_products,
            'new_products' => $new_products,
        ])->layout('layouts.base');
    }
}
