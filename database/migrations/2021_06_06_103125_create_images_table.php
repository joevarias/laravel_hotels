<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('hotel_id');
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('room_id')
            ->references('id')
            ->on('rooms')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('hotel_id')
            ->references('id')
            ->on('hotels')
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
        Schema::dropIfExists('images');
    }
}
