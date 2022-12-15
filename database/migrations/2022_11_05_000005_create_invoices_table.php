<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['Penjualan', 'Rawat Inap', 'Rawat Jalan', 'Pulang']);
            $table->string('total', 6);
            $table->string('refund', 6);
            $table->string('code', 9);
            $table->enum('status', ['Belum Lunas', 'Lunas']);
            $table->unsignedBigInteger('inpatient_id');

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
        Schema::dropIfExists('invoices');
    }
}
