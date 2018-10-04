<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Breed;

class Dog extends Model
{
  protected $table = 'dogs';

  protected $fillable = [
      'name','age', 'color',
      'dog_name','pedigree_no', 'hair_type', 'microchip_no',
      'tatto','sex', 'sir', 'dam',
      'sir_pedigree_no','dam_pedigree_no', 'breeder', 'owner',
      'owner_address','phone_number', 'email', 'dog_images',
      'date_of_birth'
  ];

  public function users()
  {
    return $this->belongsTo(User::class, 'user_id')->withDefault();
  }

  public function breeds()
  {
    return $this->belongsTo(Breed::class, 'breed_id')->withDefault();
  }


}
