<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice');
            $table->string('mode_of_payment');
            $table->date('payment_date');
            $table->float('paid_amount');
            $table->string('received_by');
            $table->integer('tenant_id')->unsigned();
           // $table->integer('rental_orders_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants');
           // $table->foreign('rental_orders_id')->references('id')->on('rental_orders');
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
        Schema::dropIfExists('payment');
    }
}
