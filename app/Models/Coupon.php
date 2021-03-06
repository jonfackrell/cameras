<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'value', 'patron', 'redeemed_at', 'expiration_at'];

    protected $dates = ['expiration_at', 'redeemed_at'];
}
