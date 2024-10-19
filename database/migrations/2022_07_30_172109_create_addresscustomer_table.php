<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddresscustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresscustomer', function (Blueprint $table) {
            $table->increments('idAddress');
            $table->integer('idCustomer');
            $table->string('Address');
            $table->string('PhoneNumber',20);
            $table->string('CustomerName',50);
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
        Schema::dropIfExists('addresscustomer');
    }
}
