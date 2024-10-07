<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $tables = 'products';

    protected $fillable = [
        'name',
        'price',
        'image',
        'des',
        'qty',
        'weight',
        'category_id',
        'brand_id',
        'brand_name',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if ($product->brand_id) {
                $brand = ProductBrand::find($product->brand_id);
                if ($brand) {
                    $product->brand_name = $brand->name;
                } else {
                    $product->brand_name = null;
                }
            } else {
                $product->brand_name = null;
            }
        });
    }

    public function getCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function getBrand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
