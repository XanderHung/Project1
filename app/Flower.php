<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $table = 'flower';
    protected $fillable =['categoryid', 'flowername','price','description','flowerimage '];
    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
    public function cart()
    {
        return $this->hasMany('App\Models\cart');
    }
}
