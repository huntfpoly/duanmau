<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartComponent extends Component
{

    public function remove($row_id)
    {
        Cart::remove($row_id);
        session()->flash('success' , 'xoa thanh cong');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
