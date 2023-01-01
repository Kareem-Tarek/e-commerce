<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Cart extends Model
{
    use HasApiTokens , HasFactory , SoftDeletes;

    public $table = 'carts';

    protected $fillable = [
        'customer_name' ,
        'customer_phone' ,
        'customer_email' ,
        'customer_address' ,
        'product_name' ,
        'available_quantity' ,
        'product_image' ,
        'is_accessory' ,
        'clothing_type' ,
        'product_category' ,
        'price' ,
        'discount' ,
        'quantity' ,
        'product_id' ,
        'customer_id' ,
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Product::class);
    }

    // public function products() : \Illuminate\Database\Eloquent\Relations\belongsToMany
    // {
    //   return $this->belongsToMany(\App\Product::class);
    // }

    public function create_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function update_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
