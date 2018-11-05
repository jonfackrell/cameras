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

    public function getRole() {
        $role = 'NA';

        if (in_array('FAC', $this->roles)) {
            $role = 'FAC';
        }
        else if (in_array('STU', $this->roles)) {
            $role = 'STU';
        }

        return $role;
    }

    public function getCheckoutPeriodText() {
        $period = $this->checkout_period . ' days';

        if (!$this->canCheckout('digital')) {
            $period = 'In-house Only';
        }
        else if ($this->checkout_period == 1) {
            $period = '24 Hours';
        }
        else if ($this->checkout_period == 2) {
            $period = '48 Hours';
        }
        else if ($this->checkout_period == 7) {
            $period = '1 week';
        }
        else if ($this->checkout_period == 14) {
            $period = '2 weeks';
        }

        return $period;
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

    public function checkouts() {
        return $this->hasMany('App\Models\Checkout');
    }

    public function canCheckout($equipmentGroup) {

        if ($this->areTermsAgreed()) {
            if ($equipmentGroup == 'digital' && $this->cameras_access_end_date >= \Carbon\Carbon::now()) {
                return true;
            }
            else if ($equipmentGroup == 'in-house') {
                return true;
            }
        }

        return false;
    }

    public function areTermsAgreed() {
        return $this->term_agreement_end_at >= \Carbon\Carbon::now();
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
