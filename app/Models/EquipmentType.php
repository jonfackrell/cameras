<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class EquipmentType extends Model implements HasMedia
{

    use HasMediaTrait;


    public function equipment() {
        return $this->hasMany('App\Models\Equipment');
    }

    public function available() {
        return $this->hasMany('App\Models\Equipment')->whereNull('checked_out_at');
    }


    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb');
    }

}
