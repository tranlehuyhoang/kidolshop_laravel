<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('idProduct');
            $table->integer('idCategory');
            $table->integer('idBrand');
            $table->integer('QuantityTotal');
            $table->string('ProductName');
            $table->string('ProductSlug');
            $table->longText('DesProduct');
            $table->text('ShortDes');
            $table->integer('Price');
            $table->integer('Sold')->default(0);
            $table->tinyInteger('StatusPro')->default(1);
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
        Schema::dropIfExists('product');
    }
}
