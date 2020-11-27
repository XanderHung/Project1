<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
    protected $fillable =['username', 'email','password','address','gender','dob','roleid'];
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
