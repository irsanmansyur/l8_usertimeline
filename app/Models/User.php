<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'username',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  public function statuses()
  {
    return $this->hasMany(Status::class);
  }
  public function followers()
  {
    return $this->belongsToMany(User::class, "follow_user", "user_id", "follower_id")->withTimestamps();
  }
  public function followings()
  {
    return $this->belongsToMany(User::class, "follow_user", "follower_id", "user_id")->withTimestamps();
  }
  public function getIsFollowAttribute()
  {
    return $this->followers()->where("follower_id", auth()->id())->exists();
  }
}
