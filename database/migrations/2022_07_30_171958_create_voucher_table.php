<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->increments('idVoucher');
            $table->string('VoucherName');
            $table->integer('VoucherQuantity');
            $table->tinyInteger('VoucherCondition');
            $table->string('VoucherNumber');
            $table->string('VoucherCode',50);
            $table->dateTime('VoucherStart');
            $table->dateTime('VoucherEnd');
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
        Schema::dropIfExists('voucher');
    }
}
