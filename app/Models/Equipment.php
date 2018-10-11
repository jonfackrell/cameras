<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public function checkouts() {
        return $this->hasMany('App\Models\Checkout');
    }
}
