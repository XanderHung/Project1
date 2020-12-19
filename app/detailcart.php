<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailcart extends Model
{
    protected $table = 'detailcart';
    protected $fillable = ['userid','done'];
}
