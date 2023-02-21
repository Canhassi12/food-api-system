<?php

namespace Truckpag\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Truckpag\Application\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'status',
        'imported_t',
        'url',
        'creator',
        'created_t',
        'last_modified_t',
        'product_name',
        'quantity',
        'brands',
        'categories',
        'labels',
        'cities',
        'purchase_places',
        'stores',
        'ingredients_text',
        'traces',
        'serving_size',
        'serving_quantity',
        'nutriscore_score',
        'nutriscore_grade',
        'main_category',
        'image_url'
    ];

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
