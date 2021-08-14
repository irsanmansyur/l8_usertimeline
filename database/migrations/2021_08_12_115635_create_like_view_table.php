<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeViewTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('like_view', function (Blueprint $table) {
      $table->foreignId("status_id")->constrained("statuses")->onDelete("cascade");
      $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
      $table->string("like")->nullable();
      $table->string("view")->nullable();
      $table->primary(['status_id', "user_id"]);
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
    Schema::dropIfExists('like_view');
  }
}
