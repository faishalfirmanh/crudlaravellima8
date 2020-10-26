<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Book extends Model
{
    //

      protected $table = 'book';

    //use SoftDeletes;
    public function category(){
     return $this->belongsToMany('App\Category');
  }
  public function order(){
    return $this->belongsToMany('App\Order');
  }

}
