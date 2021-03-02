<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Sliders extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $modalFormVisible;
    public $modelId;
    public $image_current;
    public $modalConfirmDeleteVisible = false;

    public function create()
    {
//        dd(2);
        $this->validate();
        $this->image = $this->image_current->store('slider', 'public');
        DB::table('sliders')->insertGetId($this->modelData());
        $this->reset();
        $this->modalFormVisible = false;
        session()->flash('message', 'Thêm sản phẩm thành công');

    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'image_current' => 'required',
        ]);
        if ($this->image_current == $this->image) {
            $this->image = $this->image_current;
        } else {
            $this->image = $this->image_current->store('/slider', 'public');
        }
        DB::table('sliders')->where('id', $this->modelId)->update(($this->modelData()));
        $this->modalFormVisible = false;
        session()->flash('message', 'Sửa sản phẩm thành công');
    }

    /**
     * delete categories
     */
    public function delete()
    {
        DB::table('sliders')->where('id', $this->modelId)->delete();
        $this->modalConfirmDeleteVisible = false;
        session()->flash('message', 'Xóa sản phẩm thành công');

    }

    public function createShowModal()
    {
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
        $this->image = $this->image_current;
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
     *  load data to the form update
     */
    public function loadModel()
    {
        $data = DB::table('sliders')->where('id', $this->modelId)->first();
        $this->name = $data->name;
        $this->image_current = $data->image;
    }

    public function modelData()
    {
        return [
            'name' => $this->name,
            'image' => $this->image
        ];
    }


//    Validate

    /**
     * validate rules
     * @return string[]
     */
    protected function rules()
    {
        return [
            'name' => 'required',
            'image_current' => 'required|image',
        ];
    }

    /**
     * customize message validate
     * @var string[]
     */
    protected $messages = [
        'name.required' => 'Không để trống',
        'image_current.required' => 'Không để trống',
//        'image.image' => 'file không phải là ảnh',
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

    public function read()
    {
        return DB::table('sliders')->paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.sliders', [
            'sliders' => $this->read(),
        ]);
    }
}
