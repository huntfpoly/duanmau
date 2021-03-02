<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $regular_price ;
    public $sale_price;
    public $feature_img_path;
    public $file_name;
    public $image;
    public $description;
    public $category_id;
    public $user_id;
    public $modelId;
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;

    public function mount()
    {

    }

    /**
     * create categories
     */
    public function create($userId)
    {
        $this->validate();
//        dd(2);
        $this->file_name = $this->feature_img_path->store('/product', 'public');
//        dd($this->file_name);
        Product::create($this->modelData($userId));
        $this->reset();
        $this->modalFormVisible = false;
        session()->flash('message', 'Thêm sản phẩm thành công');

    }

    /**
     * update categories
     */
    public function update($userID)
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'feature_img_path' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        if ($this->feature_img_path == $this->image) {
            $this->file_name = $this->feature_img_path;
        } else {
            $this->file_name = $this->feature_img_path->store('/product', 'public');
        }
        Product::find($this->modelId)->update($this->modelData($userID));
        $this->modalFormVisible = false;
        session()->flash('message', 'Sửa sản phẩm thành công');
    }

    /**
     * delete categories
     */
    public function delete()
    {
        Product::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        session()->flash('message', 'Xóa sản phẩm thành công');

    }

    /**
     * show form create categories
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;

    }

    /**
     * show form update
     * @param $ids
     */
    public function updateShowModal($id, $userID)
    {
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel($userID);
        $this->image = $this->feature_img_path;

    }

    /**
     *  load data to the form update
     */
    public function loadModel($userID)
    {
        $data = Product::find($this->modelId);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->regular_price = $data->regular_price;
        $this->sale_price = $data->sale_price;
        $this->feature_img_path = $data->feature_img_path;
        $this->description = $data->description;
        $this->category_id = $data->category_id;
        $this->user_id = $userID;
    }

    /**
     * get the data to update
     * @return array
     */
    public function modelData($userId)
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'feature_img_path' => $this->file_name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'user_id' => $userId,
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
            'name' => 'required|unique:App\Models\Product,name',
            'slug' => 'required|unique:App\Models\Product,slug',
            'regular_price' => 'required|numeric',
//            'sale_price' => 'numeric',
            'feature_img_path' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }

    /**
     * customize message validate
     * @var string[]
     */
    protected $messages = [
        'name.required' => 'Không để trống',
        'name.min' => 'Số kí tự lớn hơn 3',
        'slug.required' => 'Không để trống',
        'regular_price.required' => 'Không để trống',
        'regular_price.numeric' => 'Giá trị không phải là số',
//        'sale_price.required' => 'Không để trống',
//        'sale_price.numeric' => 'Giá trị không phải là số',
        'feature_img_path.required' => 'Chọn ảnh',
//        'feature_img_path.image' => 'File không phải là ảnh',
        'description.required' => 'Không để trống',
        'category_id.required' => 'Chọn danh mục',
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
        return Product::paginate(5);
    }

    public function render()
    {
        $categories = DB::table('categories')->get();
        return view('livewire.admin.products', [
            'products' => $this->read(),
            'categories' => $categories
        ]);
    }
}
