<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use CommentableTrait;
  /**
 * Fillable fields for the table.
 *
 * @var array
 */

  protected $fillable = ['body', 'user_id'];

  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }

  public function commentable()
  {
      return $this->morphTo();
  }
}
