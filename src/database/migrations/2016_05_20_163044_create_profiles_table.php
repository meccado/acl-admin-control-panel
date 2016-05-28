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
      $table->string('avatar');
      $table->string('file_name');
      $table->text('bio')->nullable();
      //$table->enum('gender', array('male', 'female'))->nullable();
      $table->text('experience');
      $table->string('address');
      $table->string('city');
      $table->string('state');
      $table->string('zip');
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
