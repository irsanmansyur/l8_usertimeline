<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request, User $user)
  {
    return view("user-information", [
      "user" => $user,
      "statuses" => $user->statuses()->with("author")->withCount(["like_view", "like_view as like_view_count" => function ($query) {
        $query->whereNotNull("like");
      }])->latest()->paginate(10),
    ]);
  }
}
