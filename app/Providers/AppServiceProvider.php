<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        $popular_product = DB::table('products')
            ->orderBy('count_view', 'desc')->limit(4)
            ->get();
        View::share('popular_product', $popular_product);
        View::share('categories', $categories);
    }
}
