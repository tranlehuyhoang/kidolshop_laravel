<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('idAdmin');
            $table->string('AdminName',50);
            $table->string('AdminUser',50);
            $table->string('AdminPass');
            $table->string('Position',50);
            $table->string('Address');
            $table->string('NumberPhone',20);
            $table->string('Email',50);
            $table->string('Avatar')->nullable();
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
        Schema::dropIfExists('admin');
    }
}
