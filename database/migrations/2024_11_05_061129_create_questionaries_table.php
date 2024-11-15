<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('min_score_mizo')->nullable();
            $table->integer('class_x_mizo')->nullable();
            $table->integer('mizo_as_mil')->nullable();
            $table->integer('comp_cert')->nullable();
            $table->integer('ncc_cert')->nullable();
            $table->integer('home_guard')->nullable();
            $table->integer('iti_eqi')->nullable();
            $table->integer('auto_mobile')->nullable();
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
        Schema::dropIfExists('questionaries');
    }
}
