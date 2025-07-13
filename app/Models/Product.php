<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
        'images',
        'sku',
        'category_id',
        'tags',
        'rating',
        'old_price',
        'stock',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'rating' => 'decimal:1',
    ];

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'product_user');
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
