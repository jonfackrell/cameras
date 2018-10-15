<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Patron extends Authenticatable
{

    use Notifiable;
    //

    protected $fillable = [
        'first_name', 'last_name', 'email', 'department', 'netid', 'inumber', 'roles'
    ];

    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
	}

    public function getRolesAttribute($value) {
        return explode('|', $value);
	}

    public function setRolesAttribute($value) {
        if(is_array($value)){
            $this->attributes['roles'] = implode('|', $value);
        }else{
            $this->attributes['roles'] = '';
        }

	}

	public function sendDifferentFileNotification($token)
    {
        $this->notify(new sendDifferentFileNotification($token));
    }

    public function setInumberAttribute($value) {
        $this->attributes['inumber'] = str_replace('-', '', $value);
    }

    public function isSuperUser(){
        return in_array($this->attributes['email'], explode(',', env('SUPER')));
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            if(is_null($model->password)){
                $model->password = bcrypt((string) Str::uuid());
            }
        });

    }

}
