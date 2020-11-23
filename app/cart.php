<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function user()
    {
        return $this->hasOne('App\Models\user');
    }
    public function flower()
    {
        return $this->hasMany('App\Models\Flower');
    }
}
