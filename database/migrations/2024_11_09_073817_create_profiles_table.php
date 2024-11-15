<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id');
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('adhar_no')->nullable();
            $table->string('p_address1')->nullable();
            $table->string('p_address2')->nullable();
            $table->integer('p_state_id')->nullable();
            $table->string('p_district_id')->nullable();
            $table->string('p_police_id')->nullable();
            $table->string('p_post_office')->nullable();
            $table->integer('p_pin')->nullable();
            $table->string('c_address1')->nullable();
            $table->string('c_address2')->nullable();
            $table->integer('c_state_id')->nullable();
            $table->string('c_district_id')->nullable();
            $table->string('c_police_id')->nullable();
            $table->string('c_post_office')->nullable();
            $table->integer('c_pin')->nullable();
            $table->string('board_id')->nullable();
            $table->string('school_name')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('year_of_passing')->nullable();
            $table->string('percentage')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
