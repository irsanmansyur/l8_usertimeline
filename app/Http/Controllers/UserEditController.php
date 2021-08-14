<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEmailRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserEditController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    $user = auth()->user();
    return view("user-edit", compact("user"));
  }
  public function update(UserUpdateRequest $request)
  {
    $validated = $request->validated();
    auth()->user()->update($validated);
    return back()->with("success", "Profile Updated");
  }
  public function update_email(UserEmailRequest $request)
  {
    $validated = $request->validated();
    if (!Hash::check($validated['password'], auth()->user()->password))
      throw ValidationException::withMessages(['password' => "Password don't match"]);
    $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);
    auth()->user()->update($validated);
    return back()->with("success", "Email Changed!");
  }
}
