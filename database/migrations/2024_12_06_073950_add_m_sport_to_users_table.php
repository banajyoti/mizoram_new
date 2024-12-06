<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMSportToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('total_ex')->after('ex_ser')->nullable();
            $table->integer('m_sport')->after('X_inMizo')->nullable();
            $table->integer('g_id')->after('m_sport')->nullable();
            $table->integer('c_ms_id')->after('g_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('total_ex');
            $table->dropColumn('m_sport');
            $table->dropColumn('g_id');
            $table->dropColumn('c_ms_id');
        });
    }
}
