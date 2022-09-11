<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('contract_id')->unsigned();
            $table->integer('house_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->foreign('house_id')->references('id')->on('houses');
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
        Schema::dropIfExists('rental_orders');
    }
}
