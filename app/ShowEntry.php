<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowEntry extends Model
{
  public function results(){
    return $this->belongsTo(Result::class);
  }
}
