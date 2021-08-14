<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Carbon\Carbon;

class TimelineController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke()
  {
    $user = auth()->user();
    $statuses = Status::whereIn("user_id", $user->followings->pluck('id'))->orWhere("user_id", $user->id)
      ->whereDate("created_at", Carbon::today())
      ->with("author")
      ->withCount(["like_view", "like_view as like_view_count" => function ($query) {
        $query->whereNotNull("like");
      }])
      ->latest()->paginate(10);
    return view("timeline", [
      "followers" => $user->followers()->withPivot("created_at")->get(),
      "status_count" => Status::count(),
      "statuses" => $statuses
    ]);
  }
}
