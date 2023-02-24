<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    const PRODUCT_SECTION = [
        'newProductSection' => 'New product section',
        'featureProductSection' => 'Feature product section',
        'dealOfTheDaySection' => 'Deal of the day section',
        'featureHeaderSection' => 'Feature Header section',
    ];

    protected $fillable=[
                'category_id',
                'store_id',
                'sku',
                'product_name',
                'product_slug',
                'price',
                'retail_price',
                'refurbished_price',
                'sale_refurbished_price',
                'quantity',
                'refurbished_quantity',
                'product_section',
                'brand',
                'weight',
                'dimensions',
                'capacity',
                'capacity_watts',
                'technology',
                'processing_speed',
                'no_of_ports',
                'memory',
                'storage',
                'form_factor',
                'generation',
                'screen_size',
                'product_type',
                'cache_type',
                'screen_resolution',
                'description',
                'specification',
                'read_before_order',
                'status',
                'created_at',
                'updated_at',
    ];
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }
//    protected function price(): Attribute
//    {
//        return Attribute::make(
//            get: fn () => number_format($this->price, 2) ,
//        );
//    }
}
