<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Comment extends Component
{
    public $comments;
    public $perPage = 5;
    public $content;
    public $user_id;
    public $product_id;
    public $count;

//    protected $listeners = [
//        'load-more' => 'loadMore'
//    ];
    public function create($user_id)
    {
//        dd(Carbon::now()->diffForHumans());
        \App\Models\comment::create([
            'content' => $this->content,
            'user_id' => $user_id,
            'product_id' => $this->product_id,
        ]);
        $this->reset();
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function render()
    {
        $this->count = count(DB::table('comments')->where('product_id', $this->product_id)->get());
        $this->comments = \App\Models\comment::where('product_id', $this->product_id)
            ->orderBy('id', 'desc')->limit($this->perPage)->get();
//        $this->emit('userStore');
        return view('livewire.comment', [
            'comments' => $this->comments
        ]);
    }
}
