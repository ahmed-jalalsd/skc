<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dog extends Model
{
  protected $table = 'dogs';

  protected $fillable = [
      'name','age', 'breed', 'color',
      'dog_name','pedigree_no', 'hair_type', 'microchip_no',
      'tatto','sex', 'sir', 'dam',
      'sir_pedigree_no','dam_pedigree_no', 'breeder', 'owner',
      'owner_address','phone_number', 'email', 'dog_images',
      'date_of_birth'
  ];

  
}
