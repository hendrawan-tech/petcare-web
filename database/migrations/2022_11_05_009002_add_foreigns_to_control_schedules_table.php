<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToControlSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('control_schedules', function (Blueprint $table) {
            $table
                ->foreign('medical_record_id')
                ->references('id')
                ->on('medical_records')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('control_schedules', function (Blueprint $table) {
            $table->dropForeign(['medical_record_id']);
        });
    }
}
