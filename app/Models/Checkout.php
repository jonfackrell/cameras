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
        'checked_out_at', 'checked_in_at', 'due_at',
    ];

	public function patron() {
		return $this->belongsTo('App\Models\Patron');
	}

    public function equipment() {
        return $this->belongsTo('App\Models\Equipment');
    }

    public function who_checked_out() {
        return $this->belongsTo('App\Models\User', 'checked_out_by');
    }

    public function who_checked_in() {
        return $this->belongsTo('App\Models\User', 'checked_in_by');
    }

    public function isLate() {
        $late = false;

        if (empty($this->checked_in_at)){
            if ($this->due_at < Carbon::now()){
                $late = true;
            }
        }
        else if ($this->due_at < $this->checked_in_at){
            $late = true;
        }
        
        return $late;
    }
}
