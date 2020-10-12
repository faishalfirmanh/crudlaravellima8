<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
      protected $table = 'book';
    public function category(){
     return $this->belongsToMany('App\Category');
  }

}
