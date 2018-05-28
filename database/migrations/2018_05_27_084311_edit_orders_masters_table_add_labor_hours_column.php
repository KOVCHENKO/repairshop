<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditOrdersMastersTableAddLaborHoursColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_masters', function (Blueprint $table) {
            $table->integer('labor_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('orders_masters')) {
            Schema::table('orders_masters', function (Blueprint $table) {
                $table->dropColumn('labor_hours');
            });
        }
    }
}
