<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class user extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';
    protected $fillable =['username', 'email','address','gender','dob','roleid'];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roletype()
    {
        return $this->hasOne('App\Models\roletype');
    }

    public function history()
    {
        return $this->hasMany('App\Models\history');
    }
    public function cart()
    {
        return $this->hasOne('App\Models\cart');
    }
}
