<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInpatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inpatients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medical_record_id');
            $table->enum('status', ['Dirawat', 'Selesai'])->default('Dirawat');
            $table->enum('step', ['1', '2', '3', '4'])->default('1');
            $table->enum('type', ['Rawat Inap', 'Rawat Jalan', 'Pulang']);
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
        Schema::dropIfExists('inpatients');
    }
}
