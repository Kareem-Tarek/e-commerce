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
        'name',
        'slug',
        'description',
        'image_name',
        'price',
        'sale_price',
        'created_at',
        'updated_at',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
