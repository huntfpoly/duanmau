<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $modalConfirmDeleteVisible;
    public $userID;
    public $search;

    public function showConfirmDelete($id)
    {
        $this->modalConfirmDeleteVisible = true;
        $this->userID = $id;
    }

    public function deleteUser()
    {
        User::destroy($this->userID);
        $this->modalConfirmDeleteVisible = false;
    }

    public function render()
    {
        $users = User::where('name','like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.admin.users', [
            'users' => $users
        ]);
    }
}
