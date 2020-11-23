<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
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
