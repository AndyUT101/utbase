<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('availabledate')->unique();
            $table->string('breakfast1')->nullable();
            $table->string('breakfast2')->nullable();
            $table->string('lunch1')->nullable();
            $table->string('lunch2')->nullable();
            $table->string('soup1')->nullable();
            $table->string('soup2')->nullable();
            $table->string('teatime1')->nullable();
            $table->string('teatime2')->nullable();
            $table->string('dinner1')->nullable();
            $table->string('dinner2')->nullable();
            $table->string('supper1')->nullable();
            $table->string('supper2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
