<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname',30);
            $table->string('lastname',30);
            $table->string('middlename',30)->nullable();
            $table->string('gender',10);
            $table->string('national_id',14)->unique();
            $table->string('telephone',15);
            $table->string('email')->unique();
            $table->string('house_id');
           // $table->foreign('house_id')->references('id')->on('house');
            $table->date('registration_date');
            $table->date('exit_date');
            $table->mediumInteger('number_of_household');
            $table->string('status');
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
        Schema::dropIfExists('tenant');
    }
}
