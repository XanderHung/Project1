<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable =['categoryname', 'categoryimage'];
    public function flower()
    {
        return $this->hasMany('App\Models\Flower');
    }
}
