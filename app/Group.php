<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Breed;

class Group extends Model
{
  use Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  /**
  * Get the posts for the user.
  */
   public function breeds()
   {
       return $this->hasMany(Breed::class);
   }

   public function showEntries()
   {
       return $this->hasMany(ShowEntry::class);
   }
}
