<?php

namespace App\Http\Livewire\Admin;

use App\Models\comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Comments extends Component
{
    public $modalView =false;
    public $showCmt;
    public $name;
    public $search;

    public function view($product_id)
    {
        $this->modalView = true;
//        $this->name = DB::table('products')->where('id', $product_id)->select('name')->first();

        $this->showCmt =  DB::table('comments')->where('product_id', $product_id)->get();
    }
    public function cancel()
    {
        $this->modalView = false;
        $this->reset();
    }

    public function render()
    {
//        dd($this->showCmt);
        $comments = DB::table('comments')
            ->join('products', 'products.id', '=', 'comments.product_id')
            ->where('products.name','like', '%' . $this->search . '%')
            ->select('comments.product_id', 'products.name','products.feature_img_path',
                DB::raw('count(comments.product_id) as total_cmt'))
            ->groupBy('comments.product_id')->limit(8)
            ->get();

//        dd($comments);
        return view('livewire.admin.comments', [
            'comments' => $comments,
        ]);
    }
}
