<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DogClass extends Model
{
  public function dogs()
  {
      return $this->hasMany(Dog::class);
  }
}
