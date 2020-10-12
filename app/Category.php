<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    protected $table = 'category';
    use SoftDeletes;
    public function book(){
     return $this->belongsToMany('App\Book');
    }

}
