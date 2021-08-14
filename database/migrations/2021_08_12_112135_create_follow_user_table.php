<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUserTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('follow_user', function (Blueprint $table) {
      $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
      $table->foreignId("follower_id")->constrained("users")->onDelete("cascade");
      $table->primary(['user_id', "follower_id"]);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('follow_user');
  }
}
