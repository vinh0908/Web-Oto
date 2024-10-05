<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductBrand extends Model
{
    use HasFactory, Sluggable;

    protected $tables = 'product_brands';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function getProducts(){
        return $this->hasMany(Product::class, 'brand_id');
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
