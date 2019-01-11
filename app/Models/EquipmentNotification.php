<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentNotification extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patron_id', 'checkout_id', 'email', 'subject', 'body',
    ];
}
