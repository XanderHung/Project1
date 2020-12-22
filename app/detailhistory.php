<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailhistory extends Model
{
    protected $table = 'detail_history';
    protected $fillable = ['historyid','flowerid','quantity'];
}
