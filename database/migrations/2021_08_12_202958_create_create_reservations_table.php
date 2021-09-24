<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_reservations', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('service_id');
            //$table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
            $table->string('service');
            $table->string('name');
            // $table->string('lastname');
            $table->string('email');
            $table->date('date');
            $table->time('time');
            $table->integer('capacity');
            $table->string('state');
            $table->string('comment');
            $table->integer('pay');
            // $table->unsignedBigInteger('service_id')->nullable();
            // $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('create_reservations');
    }
}
