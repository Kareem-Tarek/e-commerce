<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasApiTokens, HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'customer_name',
    ];

    // public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->BelongsTo(User::class);
    // }

}
