<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Illuminate\Support\Str;

class TimelineAddController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(StatusRequest $request)
  {
    $validated = $request->validated();
    $user = auth()->user();
    $user->statuses()->create(array_merge($validated, [
      "identifier" => substr($user->name, 0, 1) . Str::random("32") . $user->id,
    ]));
    return back()->with("success", "Status Di tambahkan");
  }
}
