<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Equipment extends Model implements HasMedia
{

    use HasMediaTrait;

    public function checkouts()
    {
        return $this->hasMany('App\Models\Checkout');
    }
    
    public function equipment_type()
    {
        return $this->belongsTo('App\Models\EquipmentType');
    }

    public function getDisplayName()
    {
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

    public function calculateDueAt()
    {
        if($this->group == 'camera'){
            // Normal checkout period for cameras is 24 hours
            return now()->addHours(24);
        }else if($this->equipment_type->loan_type == 'CUSTOM'){
            // Checkout period is determined by the equipment type
            return now()->addHours($this->equipment_type->loan_period);
        }else{
            // Checkout period is typically only until the end of current day
            return Carbon::tomorrow('America/Denver')->subMinutes(30)->tz('UTC');
        }
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb');
    }
}
