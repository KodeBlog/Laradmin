<?php

namespace Larashop\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Larashop\Notifications\LarashopAdminResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes, EntrustUserTrait {
        SoftDeletes::restore insteadof EntrustUserTrait;
        EntrustUserTrait::restore insteadof SoftDeletes;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 
    'email', 
    'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 
    'remember_token',
    ];

    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/" . md5($this->email) . "?d=mm";
    }
}
