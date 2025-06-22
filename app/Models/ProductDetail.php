<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        'product_name',
        'discount',
        'cost',
        'category_id',
        'available',
        'image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
   

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    protected $appends = ['image_url'];

public function getImageUrlAttribute()
{
    return asset('storage/images/'.$this->image);
}
    
}
