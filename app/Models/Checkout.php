<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Checkout extends Model implements HasMedia
{

    use HasMediaTrait;

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

    public function emails() {
        return $this->hasMany(EquipmentNotification::class);
    }

    public function isLate() {
        $late = false;

        if (empty($this->checked_in_at)){
            $late = $this->due_at < Carbon::now();
        }
        else {
            $late = $this->due_at < $this->checked_in_at;
        }
        
        return $late;
    } 

    public function isDueToday() {
        $today = Carbon::now()->tz('America/Denver');
        $due_at = $this->due_at->tz('America/Denver');
        $due = false;

        if (empty($this->checked_in_at)){
            $due = $today->isSameDay($due_at);
        }
        
        return $due;
    }

    public function calculateLateFee() {

	    if(is_null($this->checked_in_at)){
            $date = now();
        }else{
	        $date = $this->checked_in_at;
        }
	    $fee = (($this->equipment->equipment_type->fine_amount * $date->diffInWeekdays($this->due_at)) / 100);

        return $fee;
    }

    /**
     * Scope a query to only include late checkouts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWasLate($query)
    {

        return $query->where(function ($query) {
            $query->whereNotNull('checked_in_at')
                    ->whereColumn('due_at', '<', 'checked_in_at');
        })->orWhere(function ($query) {
            $query->whereNull('checked_in_at')
                    ->where('due_at', '<', now());
        });

    }


    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb');
    }
}
