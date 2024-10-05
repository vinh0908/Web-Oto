<?php

namespace App\Http\Controllers;

use App\Models\ProductBrand;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    public function getBrand(){
        $productBrands = ProductBrand::orderBy('id', 'desc')->get();

        return view('admin.product_brand.list')->with('datas', $productBrands);
    }

    public function getViewAddBrand(){
        return view('admin.product_brand.add');
    }

    public function addProductBrand(Request $request){
        //validate gia tri nguoi dung gui len
        $request->validate(['name' => 'required|max:255']);

        $slug = SlugService::createSlug(ProductBrand::class, 'slug', $request->name);

        //luu vao DB
        ProductBrand::create([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return redirect()->route('product_brand.list')->with('success', 'Thêm danh mục thành công !');
    }


    public function deleteBrand($id){
        $productBrand = ProductBrand::find($id);

        $productBrand->delete();

        return redirect()->route('product_brand.list')->with('success', 'Xóa danh mục thành công !');
    }
}
