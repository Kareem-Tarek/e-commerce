<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens , HasFactory , SoftDeletes;

    // protected $fillable = [
    //     'name', 
    //     'description', 
    //     'image', 
    //     'available_quantity',
    //     'size_id', 
    //     'price', 
    //     'clothing_type',  
    //     'is_accessory', 
    //     'product_category', 
    //     'discount', 
    //     'brand_name',
    //     'create_user_id',
    //     'update_user_id',
    // ];

    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(User::class, 'brand_name', 'id');   // this relationship is implemented for "suppliers" ONLY! who owns products
    }

    public function cart(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Cart::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function rating(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Rating::class, 'product_id');
    }

    public function favorite(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Favorite::class);
    }

    public function size(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Size::class, 'product_id', 'id');
    }

    public function create_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function update_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
