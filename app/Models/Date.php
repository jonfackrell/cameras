<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = [
        'description', 'end_at'
    ];

    protected $dates = [
        'end_at'
    ];
}
