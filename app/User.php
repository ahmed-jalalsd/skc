<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Dog;
use App\Post;
use App\Event;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_token', 'phone_number', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Get the posts for the user.
    */
   public function posts()
   {
       return $this->hasMany(Post::class, 'author_id');
   }

   public function events()
   {
       return $this->hasMany(Event::class, 'user_id');
   }

   public function dogs()
   {
     return $this->hasMany(Dog::class);
   }

}
