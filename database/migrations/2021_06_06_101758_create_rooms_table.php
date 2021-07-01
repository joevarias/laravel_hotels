<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('room_type_id');
            $table->string('room_no');
            $table->string('room_floor');
            $table->integer('rate');
            $table->boolean('smoking_yn')->default(0);
            $table->timestamps();

            $table->foreign('hotel_id')
            ->references('id')
            ->on('hotels')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('room_type_id')
            ->references('id')
            ->on('room_types')
            ->onDelete('restrict')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
