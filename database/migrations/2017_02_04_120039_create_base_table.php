<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nickname')->unique();
            $table->char('gender', 1);
            $table->string('email')->unique();
            $table->string('password', 96);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('meal', function (Blueprint $table) {
            $table->increments('id');
            $table->date('availabledate');
            $table->string('breakfast');
            $table->string('lunch');
            $table->string('soup');
            $table->string('teatime');
            $table->string('dinner');
            $table->string('supper');
            $table->timestamps();
        });


        Schema::create('holiday', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('holiday');
            $table->string('description');
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
        Schema::dropIfExists('user');
        Schema::dropIfExists('meal');
        Schema::dropIfExists('holiday');
    }
}
