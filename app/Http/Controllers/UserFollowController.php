<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserFollowController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request, User $user)
  {
    if ($user->is_follow)
      $user->followers()->detach(auth()->user()->id);
    else
      $user->followers()->attach(auth()->user()->id);
    return back();
  }
}
