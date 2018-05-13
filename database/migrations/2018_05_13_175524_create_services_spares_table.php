<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesSparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_spares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spare_id')->unsigned()->nullable();
            $table->foreign('spare_id')->references('id')
                ->on('spares');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')
                ->on('services');
            $table->integer('quantity')->unsigned()->nullable();
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
        Schema::dropIfExists('services_spares');
    }
}
