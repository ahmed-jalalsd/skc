<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'galleries';
  protected $fillable = [
      'title', 'slug', 'cover_image'
  ];

  public function photos(){
    return $this->hasMany(Photo::class);
  }

  public function scopeFilter($query, $filters)
  {
    if ( isset($filters['year']) ) {
     $year = $filters['year'];
     $query->whereYear('created_at', $year);
   }
  }
}
