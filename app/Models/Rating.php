<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'score', 'product_detail_id', 'user_id'
    ];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
