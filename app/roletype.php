<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roletype extends Model
{
    public function user()
    {
        return $this->hasMany('App\Models\user');
    }
}
