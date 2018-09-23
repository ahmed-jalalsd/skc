<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  /**
 * Fillable fields for the table.
 *
 * @var array
 */

  protected $fillable = ['body'];

  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }

  public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }



}
