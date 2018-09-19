<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name', 'label',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}