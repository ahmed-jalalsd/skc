<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dog;
use App\User;
use App\Event;
use App\ShowEntry;

class Result extends Model
{
  protected $fillable = [
      'order', 'classification'
  ];

  public function showsEntries()
  {
    return $this->belongsTo(ShowEntry::class, 'show_entries_id');
  }
}
