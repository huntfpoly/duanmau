<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Categories extends Component
{
    public $name;
    public $slug;
    public $modelId;
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;

    public function mount()
    {
        $this->reset();
    }

    /**
     * create categories
     */
    public function create()
    {
        $this->validate();
        Category::create($this->modelData());
        $this->reset();
        $this->modalFormVisible = false;
        session()->flash('message', 'Thêm sản phẩm thành công');
    }

    /**
     * update categories
     */
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        Category::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
        session()->flash('message', 'Sửa sản phẩm thành công');
    }

    /**
     * delete categories
     */
    public function delete()
    {
        Category::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        session()->flash('message', 'Xóa sản phẩm thành công');
    }

    /**
     * show form create categories
     */
    public function createShowModal()
    {
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * show form update
     * @param $ids
     */
    public function updateShowModal($id)
    {
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    /**
     *  load data to the form update
     */
    public function loadModel()
    {
        $data = Category::find($this->modelId);
        $this->name = $data->name;
        $this->slug = $data->slug;
    }

    /**
     * get the data to update
     * @return array
     */
    public function modelData()
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug
        ];
    }

    /**
     * Show confirm delete categories
     * @param $id
     */
    public function deleteShowModal($id)
    {
        $this->modalConfirmDeleteVisible = true;
        $this->modelId = $id;
    }

    /**
     * generate name -> slug
     */
    public function generatesSlug()
    {
        $this->slug = Str::slug($this->name);
    }

//    Validate

    /**
     * validate rules
     * @return string[]
     */
    protected function rules()
    {
        return [
            'name' => 'required|unique:App\Models\Category,name',
            'slug' => 'required|unique:App\Models\Category,slug'
        ];
    }

    /**
     * customize message validate
     * @var string[]
     */
    protected $messages = [
        'name.required' => 'Tên không được để trống.',
        'name.unique' => 'Tên không được trùng.',
        'slug.email' => 'Tên không được để trống.',
        'name.unique' => 'Tên không được trùng.'
    ];

    /**
     * validate realtime
     * @param $field
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    /**
     * Show data to the screen
     * @return mixed
     */
    public function read()
    {
        return Category::paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.categories', [
            'categories' => $this->read()
        ]);
    }
}
