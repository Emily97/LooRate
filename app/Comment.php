<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function bathroom() {
      return $this->belongsTo('App\Bathroom');
  }
}
