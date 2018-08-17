<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'slug', 'excerpt', 'content', 'bk_image', 'ft_image'
  ];

  public function users(){
    return $this->belongsTo(User::class, 'user_id');
  }
}
