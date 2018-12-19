<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public function checkouts() {
        return $this->hasMany('App\Models\Checkout');
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
}
