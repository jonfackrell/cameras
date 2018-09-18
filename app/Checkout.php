<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'checked_out_at', 'checked_in_at', 'checkout_note', 'checkin_note',
    ];
}
