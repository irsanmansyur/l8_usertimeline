<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $fillable = ['body', "identifier"];
  use HasFactory;

  public function author()
  {
    return $this->belongsTo(User::class, "user_id");
  }
  public function like_view()
  {
    return $this->belongsToMany(User::class, "like_view", "status_id", "user_id")->withTimestamps();
  }
  public function getUserIsLikeAttribute()
  {
    return  $this->like_view()->where("user_id", auth()->user()->id)->exists();
  }
}
