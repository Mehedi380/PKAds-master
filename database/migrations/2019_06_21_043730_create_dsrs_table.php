<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDSRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('schedule_id')->unsigned()->nullable();
            $table->string('release_order');
            $table->date('cheque_date');
            $table->string('bill_no');
            $table->string('mr_no');
            $table->date('publishing_date');
            $table->string('cheque_no');
            $table->text('remarks')->nullable();
            $table->foreign('schedule_id')->references('id')->on('schedules')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('dsrs');
    }
}