<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  protected $fillable = [
    'manufacturer', 'year', 'engine', 'plate', 'user_id'
  ];

  public function user(){
    return $this->belongTo('App\User');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }
}
