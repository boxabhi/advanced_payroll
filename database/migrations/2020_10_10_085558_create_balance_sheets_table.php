<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_sheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->integer('number_of_working_hours');
            $table->string('working_day_salary');
            $table->string('epf');
            $table->string('esic');
            $table->string('net_payment');
            $table->string('date_of_transfer');
            $table->foreign('emp_id')->references('id')->on('employees');
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
        Schema::dropIfExists('balance_sheets');
    }
}
