<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Support\Str;
use Livewire\Component;

class PagesComponent extends Component
{
    public $modalFormVisible;
    public $slug;
    public $title;
    public $content;
    public $modelId;
    public $modalConfirmDeleteVisible;

    /**
     * Mount function
     */
    public function mount()
    {
//        $this->reset();
    }

    /**
     * create function.
     */
    public function create()
    {
        $this->validate();
        Page::create($this->modelData());
        $this->reset();
        $this->modalFormVisible = false;
    }

    /**
     * The read function.
     * @return mixed
     */
    public function read()
    {
        return Page::paginate(2);
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;

    }

    /**
     * delete function.
     */
    public function delete()
    {
        Page::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }

    /**
     * Show the form modal of the create function
     */
    public function createShowModal()
    {
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Show the form modal of the update function
     * @param $id
     */
    public function updateShowModal($id)
    {
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    /**
     * Show the form modal of the delete function.
     * @param $id
     */
    public function deleteShowModal($id)
    {
        $this->modalConfirmDeleteVisible = true;
        $this->modelId = $id;
    }

    /**
     * load model
     */
    public function loadModel()
    {
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
    }

    /**
     * The data for the model mapped in this component
     * @return array
     */
    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content
        ];
    }

    /**
     *  generates slug
     */
    public function generatesSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    /**
     * validate form
     * @return array
     */
    protected function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required|unique:App\Models\Page,slug',
            'content' => 'required'
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    /**
     * The livewire render function.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.pages-component', [
            'data' => $this->read()
        ]);
    }
}
