<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->string('age_prof_cert')->nullable();
            $table->string('class_x_cert')->nullable();
            $table->string('mizu_lang_cert')->nullable();
            $table->string('homeguard_cert')->nullable();
            $table->string('caste_cert')->nullable();
            $table->string('ncc_cert')->nullable();
            $table->string('comp_cert')->nullable();
            $table->string('mechanic_ex_cert')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
