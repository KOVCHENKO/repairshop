<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('completion_date');
            $table->integer('manager_id')->unsigned()->nullable();
            $table->foreign('manager_id')->references('id')
                ->on('users');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')
                ->on('users');
            $table->integer('auto_id')->unsigned()->nullable();
            $table->foreign('auto_id')->references('id')
                ->on('autos');
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
        Schema::dropIfExists('orders');
    }
}
