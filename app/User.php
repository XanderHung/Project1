<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class user extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable =['username', 'email','address','gender','dob','roleid'];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roletypes()
    {
        return $this->belongsTo(roletype::class,'roleid');
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
