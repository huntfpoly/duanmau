<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
Route::get('/home', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::get('/', \App\Http\Livewire\HomeComponent::class)->name('home');

Route::get('/shop', \App\Http\Livewire\ShopComponent::class);
Route::get('/cart', \App\Http\Livewire\CartComponent::class);
Route::get('/checkout', \App\Http\Livewire\CheckoutComponent::class);

Route::get('/product/{slug}', \App\Http\Livewire\DetailsComponent::class)->name('product.detail');

// For user or customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');

});



// For admin or customer
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
                return view('dashboard');
        })->name('dashboard');
        Route::get('/pages', function () {
            return view('admin.pages');
        })->name('pages');
        Route::get('/categories', function () {
            return view('admin.categories');
        })->name('admin.categories');
        Route::get('/products', function () {
            return view('admin.products');
        })->name('admin.products');
        Route::get('/sliders', function () {
            return view('admin.sliders');
        })->name('admin.sliders');
        Route::get('/users', function () {
            return view('admin.users');
        })->name('admin.users');
        Route::get('/comments', function () {
            return view('admin.comments');
        })->name('admin.comments');
    });

//    Route::prefix('/admin/categories')->group(function () {
//        Route::get('/', \App\Http\Livewire\Admin\Category\AdminCategoryComponent::class)->name('admin.categories');
//        Route::get('/add', \App\Http\Livewire\Admin\Category\AdminAddCategoryComponent::class)->name('admin.addcategories');
//        Route::get('/edit/{slug}', \App\Http\Livewire\Admin\Category\AdminEditCategoryComponent::class)->name('admin.editcategories');
//    });
//    Route::prefix('/admin/products')->group(function (){
//        Route::get('/', \App\Http\Livewire\Admin\Product\AdminProductComponent::class)->name('admin.products');
//        Route::get('/add', \App\Http\Livewire\Admin\Product\AdminAddProductComponent::class)->name('admin.addproducts');
//        Route::get('/edit/{id}', \App\Http\Livewire\Admin\Product\AdminEditProductComponent::class)->name('admin.editproducts');
//    });
//    Route::prefix('/admin/sliders')->group(function (){
//        Route::get('/', \App\Http\Livewire\Admin\Slider\AdminSliderComponent::class)->name('admin.sliders');
//        Route::get('/add', \App\Http\Livewire\Admin\Slider\AdminAddSliderComponent::class)->name('admin.addsliders');
//        Route::get('/edit/{id}', \App\Http\Livewire\Admin\Slider\AdminEditSliderComponent::class)->name('admin.editslider');
//    });
});
