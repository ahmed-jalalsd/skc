<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Group;
use App\Dog;

class Breed extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  public function groups(){
    return $this->belongsTo(Group::class, 'group_id')->withDefault();
  }

  public function dogs()
  {
      return $this->hasMany(Dog::class);
  }

}
