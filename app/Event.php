<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
      'title', 'slug', 'excerpt', 'content', 'images', 'featured_image'
  ];

  public function users(){
    return $this->belongsTo(User::class, 'user_id')->withDefault();
  }

  public function scopeFilter($query, $filters)
  {
    if ( isset($filters['year']) ) {
     $year = $filters['year'];
     $query->whereYear('created_at', $year);
   }
  }
}
