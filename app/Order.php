<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
      public $table = 'order';

      public function user(){
       return $this->belongsTo('App\User');
      }
      public function book(){
        return $this->belongsToMany('App\Book')->withPivot('quantity');
      }
      public function getTotalQuantityAttribute(){
       $total_quantity = 0;
       foreach($this->book as $book){
       $total_quantity += $book->pivot->quantity;
       }
       return $total_quantity;
      }
}
