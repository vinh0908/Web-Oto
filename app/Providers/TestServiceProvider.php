<?php

namespace App\Providers;

use App\Http\ViewComposers\ProductCategoryComposer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::share('owner_email', 'levantest@gmail.com');
        // View::share('product_categories_composer', Product::all());

        View::composer([
            'admin.product.list',
            'admin.product.add',
            'admin.product.edit'],
            ProductCategoryComposer::class);
        // View::composer('*',ProductCategoryComposer::class);
        // View::share('product_categories_composer', ProductCategory::all());
    }
}
