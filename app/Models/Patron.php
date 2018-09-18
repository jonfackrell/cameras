<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patron extends Model
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'department', 'netid', 'inumber'
    ];

    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
	}

	public function sendDifferentFileNotification($token)
    {
        $this->notify(new sendDifferentFileNotification($token));
    }

    public function setInumberAttribute($value) {
        $this->attributes['inumber'] = str_replace('-', '', $value);
    }
}
