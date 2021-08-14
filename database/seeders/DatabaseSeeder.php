<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::factory()->has(Status::factory()->count(5))->create([
      "name" => "Irsan Mansyur",
      'username' => "irsanm",
      "email" => "irsan00mansyur@gmail.com"
    ]);
    User::factory()->count(8)->has(Status::factory()->count(7))->create();
  }
}
