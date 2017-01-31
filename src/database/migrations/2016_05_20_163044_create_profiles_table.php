<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('profiles', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->string('avatar')->nullable();
      $table->string('file_name')->nullable();
      $table->text('bio')->nullable();
      //$table->enum('gender', array('male', 'female'))->nullable();
      $table->text('experience')->nullable();
      $table->string('address')->nullable();
      $table->string('city')->nullable();
      $table->string('state')->nullable();
      $table->string('zip')->nullable();
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
    Schema::drop('profiles');
  }
}
