<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuRolePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menu_role', function (Blueprint $table) {
          $table->integer('menu_id')->unsigned()->index();
          $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
          $table->integer('role_id')->unsigned()->index();
          $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
          $table->primary(['menu_id', 'role_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_role');
    }
}
