<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
  public function dogs()
  {
      return $this->hasMany(Dog::class);
  }

  public function showEntries()
  {
      return $this->hasMany(ShowEntry::class);
  }
}
