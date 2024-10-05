<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use App\Models\ProductCategory;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getProduct()
    {
        // Auth::logout();
        //Eloquent
        $products = Product::orderBy('id', 'desc')->limit(12)->get();
        $posts = Post::orderBy('id', 'desc')->limit(12)->get();

        $productCategories = ProductCategory::orderBy('name', 'desc')->get();
        $productBrands = ProductBrand::orderBy('name', 'desc')->get();


        $productCategories = ProductCategory::orderBy('name', 'desc')->get()->filter(function ($productCategory) {
            return ($productCategory->getProducts->count() > 0);
        })->values();
        $productBrands = ProductBrand::orderBy('name', 'desc')->get()->filter(function ($productBrand) {
            return ($productBrand->getProducts->count() > 0);
        })->values();

        return view('frontend.home')
            ->with('productCategories', $productCategories)
            ->with('productBrands', $productBrands)
            ->with('products', $products)
            ->with('posts', $posts);
    }

    public function getProductList(Request $request)
    {
        $sort = $request->sort ?? 0;
        $sortBy = [
            'field' => $sort === 1 ? 'price' : 'id',
            'sortBy' => $sort === 1 ? 'asc' : 'desc',
        ];

        $min = $request->min ?? null;
        $max = $request->max ?? null;

        $category = $request->category ?? null;
        $brand = $request->brand ?? null;

        $name = $request->name ?? null;

        $products = Product::query();

        if (!is_null($min) && !is_null($max)) {
            $products->whereBetween('price', [$min, $max]);
        }

        if (!is_null($category) && $category != 'all') {
            $products->where('category_id', $category);
        }

        if (!is_null($brand) && $brand != 'all') {
            $products->where('brand_id', $brand);
        }

        if (!is_null($name)) {
            $products->where('name', 'like', '%' . $name . '%');
        }

        $products = $products->orderBy($sortBy['field'], $sortBy['sortBy'])->paginate(6);

        $productCategories = ProductCategory::with('products')
            ->has('products')
            ->orderBy('name', 'desc')
            ->get();

        $productBrands = ProductBrand::with('products')
            ->has('products')
            ->orderBy('name', 'desc')
            ->get();

        return view('frontend.product_list', [
            'products' => $products,
            'min' => Product::min('price'),
            'max' => Product::max('price'),
            'productCategories' => $productCategories,
            'productBrands' => $productBrands,
        ]);
    }

    public function getBlog()
    {
        $posts = Post::orderBy('id', 'desc')->get();


        return view('frontend.blog')
            ->with('posts', $posts);
    }

    public function getAboutUs()
    {
        return view('frontend.aboutus');
    }

    public function getContact()
    {
        return view('frontend.contact');
    }

    public function getSanpham($categorySlug, $brandSlug = null)
    {
        $query = Product::query();

        if ($categorySlug) {
            $category = ProductCategory::where('slug', $categorySlug)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($brandSlug) {
            $brand = ProductBrand::where('slug', $brandSlug)->first();

            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }

        $products = $query->orderBy('id', 'desc')->limit(20)->get();

        // Lấy các danh mục có sản phẩm
        $categories = ProductCategory::has('getProducts')->orderBy('name', 'desc')->get();

        // Lấy các thương hiệu có sản phẩm
        $brands = ProductBrand::has('getProducts')->orderBy('name', 'desc')->get();

        // Lấy các sản phẩm thuộc từng danh mục
        foreach ($categories as $category) {
            $category->products = $category->getProducts()->orderBy('id', 'desc')->limit(20)->get();
        }

        // Lấy các sản phẩm thuộc từng thương hiệu
        foreach ($brands as $brand) {
            $brand->products = $brand->getProducts()->orderBy('id', 'desc')->limit(20)->get();
        }

        $results = [
            'categories' => $categories,
            'brands' => $brands,
        ];

        return view('frontend.allproduct')
            ->with('results', $results)
            ->with('products', $products);
    }
}
