<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\User;

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

  public function comments()
  {
    return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
  }


  public function scopeFilter($query, $filters)
  {
    if ( isset($filters['year']) ) {
     $year = $filters['year'];
     $query->whereYear('created_at', $year);
   }
  }

}
