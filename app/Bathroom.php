<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bathroom extends Model
{
    protected $fillable = ['title', 'address', 'longitude', 'latitude', 'price', 'rating'];

      public function comments() {
          return $this->hasMany('App\Comment');
      }
}
