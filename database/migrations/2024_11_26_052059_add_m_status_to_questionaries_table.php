<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMStatusToQuestionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionaries', function (Blueprint $table) {
            $table->integer('m_status')->after('auto_mobile')->nullable();
            $table->integer('m_question')->after('m_status')->nullable();
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
            $table->dropColumn('m_status');
            $table->dropColumn('m_question');
        });
    }
}
