<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'photos';
  protected $fillable = [
      'title', 'images'
  ];

  public function galleries(){
    return $this->belongsTo(Gallery::class, 'gallery_id');
  }
}
