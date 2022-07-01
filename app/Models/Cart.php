<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
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
}
