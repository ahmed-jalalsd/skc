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

  public function showsEntries()
  {
    return $this->hasMany(ShowEntry::class);
  }
}
