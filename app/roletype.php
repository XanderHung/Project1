<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roletype extends Model
{
    protected $table = 'roletype';
    public function users()
    {
        return $this->hasOne(user::class);
    }
}
