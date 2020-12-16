<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table = 'history';
    public function user()
    {
        return $this->hasOne('App\Models\user');
    }
}
