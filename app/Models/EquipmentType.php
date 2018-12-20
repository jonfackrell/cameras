<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    public function equipment() {
        return $this->hasMany('App\Models\Equipment');
    }
}
