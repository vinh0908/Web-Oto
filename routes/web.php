<?php

use App\Events\TestEvent;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->middleware('auth.admin')->group(function(){
    Route::get('', function(){
        return view('admin.layout');
    });
    Route::get('post', function(){
        return view('admin.post.list');
    });
    Route::get('user', [UserController::class, 'getUser']);

    //Product
    Route::post('product/get_slug', [ProductController::class, 'getSlug'])->name('product.get_slug');
    Route::get('product', [ProductController::class, 'getProduct'])->name('admin.product.list');
    Route::get('product/add',[ProductController::class, 'getViewAddProduct'])->name('product.add');
    Route::post('product/save', [ProductController::class, 'addProduct'])->name('product.save')->middleware('auth.admin');;
    Route::post('product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
    Route::get('product/edit/{id}', [ProductController::class, 'getProductDetail'])->name('product.detail');
    Route::post('product/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');

    //posts
    Route::post('post/get_slug', [PostController::class, 'getPostSlug'])->name('post.get_slug');
    Route::get('post', [PostController::class, 'getPost'])->name('admin.post.list');
    Route::get('post/add',[PostController::class, 'getViewAddPost'])->name('post.add');
    Route::post('post/save', [PostController::class, 'addPost'])->name('post.save')->middleware('auth.admin');;
    Route::post('post/delete/{id}', [PostController::class, 'deletePost'])->name('post.delete');
    Route::get('post/edit/{id}', [PostController::class, 'getPostDetail'])->name('post.detail');
    Route::post('post/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');

    //Product Category
    Route::get('product_category',[ProductCategoryController::class, 'getCategories'])->name('product_category.list');
    Route::get('product_category/add', [ProductCategoryController::class, 'getViewAddCategory'])->name('product_category.add');
    Route::post('product_category/save', [ProductCategoryController::class, 'addProductCategory'])->name('product_category.save');
    Route::post('product_category/delete/{id}', [ProductCategoryController::class, 'deleteCategories'])->name('product_category.delete');

    //Product Brand
    Route::get('product_brand',[ProductBrandController::class, 'getBrand'])->name('product_brand.list');
    Route::get('product_brand/add', [ProductBrandController::class, 'getViewAddBrand'])->name('product_brand.add');
    Route::post('product_brand/save', [ProductBrandController::class, 'addProductBrand'])->name('product_brand.save');
    Route::post('product_brand/delete/{id}', [ProductBrandController::class, 'deleteBrand'])->name('product_brand.delete');

    //Dashboard
    Route::get('/dashboard',[DashboadController::class, 'index'])->name('dashboard.index');
});



Route::get('/', [HomeController::class, 'getProduct'])->name('home');
Route::get('product/{slug}', [ProductController::class, 'getProductBySlug'])->name('product.detail.slug');

//Cart
Route::get('add-to-cart/{id}/{qty?}', [CartController::class, 'addProductToCart'])->name('add.product.to.cart');
Route::get('shopping-cart', [CartController::class,'shoppingCart'])->name('shopping.cart');
Route::get('delete-cart', [CartController::class, 'deleteCart'])->name('delete.cart');
Route::get('delete-item-cart/{id}', [CartController::class, 'deleteItemCart'])->name('delete.item.cart');
Route::post('update-cart', [CartController::class,'updateCart'])->name('update.cart');


//Checkout
Route::get('checkout',[CartController::class, 'getCheckout'])->name('checkout')->middleware('auth');
Route::post('place-order', [CheckoutController::class, 'saveOrder'])->name('place.order')->middleware('auth');

Auth::routes();

Route::get('product-list',[HomeController::class, 'getProductList'])->name('product.list');
Route::get('blog',[HomeController::class, 'getBlog'])->name('blog.list');
Route::get('contact',[HomeController::class, 'getContact'])->name('contact.list');
Route::get('san-pham/{categorySlug?}',[HomeController::class, 'getSanpham'])->name('tongsanpham');




Route::get('test', function(){

    $order = Order::find(1);

    $order->status = Order::STATUS_DONE;

    $order->save();

    event(new TestEvent($order));
});
