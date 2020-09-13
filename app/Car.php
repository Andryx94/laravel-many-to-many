<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  protected $fillable = [
    'manufacturer','model', 'year', 'engine', 'plate', 'user_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }
}
