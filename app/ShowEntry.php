<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowEntry extends Model
{
  public function results(){
    return $this->belongsTo(Result::class);
  }

  public function events()
  {
      return $this->belongsTo(Event::class, 'event_id');
  }

}
