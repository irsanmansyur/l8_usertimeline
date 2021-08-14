<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class TimelineStatusLikeController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request, Status $status)
  {
    $user = auth()->user();
    if ($status->user_is_like)
      $status->like_view()->detach($user->id);
    else
      $status->like_view()->attach($user->id, [
        "like" => "suka"
      ]);
    return back()->with("message", "Status di Suka");
  }
}
