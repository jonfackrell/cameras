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
}
