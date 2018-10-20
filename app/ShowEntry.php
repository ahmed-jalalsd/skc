<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowEntry extends Model
{

  protected $fillable = [
      'user_id', 'dog_id', 'event_id', 'class_id'
  ];

  public function results(){
    return $this->belongsTo(Result::class);
  }

  public function events()
  {
      return $this->belongsTo(Event::class, 'event_id');
  }

  public function dogs()
  {
    return $this->belongsTo(Dog::class, 'dog_id');
  }

  public function classes()
  {
    return $this->belongsTo(Classes::class, 'class_id');
  }

  public function groups()
  {
    return $this->belongsTo(Group::class, 'group_id');
  }

}
