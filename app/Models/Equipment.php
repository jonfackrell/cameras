<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Equipment extends Model implements HasMedia
{

    use HasMediaTrait;

    public function checkouts() {
        return $this->hasMany('App\Models\Checkout');
    }
    
    public function equipment_type() {
        return $this->belongsTo('App\Models\EquipmentType');
    }

    public function getDisplayName() {
    	$displayName = '';

    	if (empty($this->item) || $this->item == 'NULL') {
    		if (!empty($this->description)) {
    			$displayName = $this->description;
    		}
    	}
    	else {
    		$displayName = $this->item;
    	}
    	
        return $displayName;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb');
    }
}
