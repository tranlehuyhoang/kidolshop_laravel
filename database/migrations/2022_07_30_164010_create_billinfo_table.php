<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billinfo', function (Blueprint $table) {
            $table->integer('idBill');
            $table->integer('idProduct');
            $table->string('AttributeProduct',50);
            $table->integer('Price');
            $table->integer('QuantityBuy');
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
        Schema::dropIfExists('billinfo');
    }
}
