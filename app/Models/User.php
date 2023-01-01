<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
//use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes/*, InteractsWithMedia*/;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     //method (1) - wrting the columns from the table
        // protected $fillable = [
        //     'avatar', 
        //     'cover', 
        //     'name', 
        //     'username',
        //     'phone', 
        //     'bio', 
        //     'email',  
        //     'password', 
        //     'gender', 
        //     'dob', 
        //     'user_type', 
        //     'address',
        //     'country_id', 
        //     'governorate_id', 
        //     'email_verified_at',
        //     'city_id', 
        //     'whatsapp',
        //     'facebook',
        //     'instagram',
        //     'last_login_at',
        //     'last_login_ip',
        // ];
    
    //method (2) - every column in the table in general
        protected $guarded = [];

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(Product::class);
    }

    public function cart(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(Cart::class, 'customer_id');
    }

    public function rating(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Rating::class, 'customer_id');
    }

    public function favorite(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Favorite::class, 'customer_id');
    }

    // public function subscription(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->HasMany(Subscription::class);
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getPhotoAttribute()
    // {
    //     return $this->getFirstMediaUrl('avatar')
    //         ?  $this->getFirstMediaUrl('avatar')
    //         : asset('images/signin_color.png');
    // }

    public function scopeType($query,$arg)
    {
        return $query->where('user_type',$arg);
    }
}
