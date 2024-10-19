<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleproduct', function (Blueprint $table) {
            $table->Increments('idSale');
            $table->integer('idProduct');
            $table->string('SaleName');
            $table->dateTime('SaleStart');
            $table->dateTime('SaleEnd');
            $table->integer('Percent');
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
        Schema::dropIfExists('saleproduct');
    }
}
