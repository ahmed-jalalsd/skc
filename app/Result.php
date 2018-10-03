<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dog;
use App\User;
use App\Event;

class Result extends Model
{
  protected $fillable = [
      'order', 'classification'
  ];

  public function events()
  {
    return $this->hasMany(Event::class);
  }

  public function dogs()
  {
    return $this->hasMany(Dog::class);
  }
}
