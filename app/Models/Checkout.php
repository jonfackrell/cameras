<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    protected $dates = [
        'checked_out_at', 'checked_in_at',
    ];

    public function getCheckedOutDate() {
    	
        return $this->checked_out_at->tz('America/Denver')->format('M d Y');
	}

    public function getDueDate() {
        $date = Carbon::parse($this->due_at);
        return $date->format('M d Y');
    }

    public function getCheckedInDate() {
        if(is_null($this->checked_in_at)){
            return ' ';
        }
        $date = Carbon::parse($this->checked_in_at);
        return $date->format('M d Y');
    }

	public function patron() {
		return $this->belongsTo('App\Models\Patron');
	}

    public function equipment() {
        return $this->belongsTo('App\Models\Equipment');
    }
}
