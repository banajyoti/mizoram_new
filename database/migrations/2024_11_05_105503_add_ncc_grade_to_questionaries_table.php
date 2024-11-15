<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNccGradeToQuestionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionaries', function (Blueprint $table) {
            $table->integer('ncc_grade')->default(0)->comment('1 A,2 B,3 C');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionaries', function (Blueprint $table) {
            $table->dropColumn('ncc_grade');
        });
    }
}
