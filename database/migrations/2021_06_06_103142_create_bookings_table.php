<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('booking_status_id')->default(1);
            $table->unsignedBigInteger('payment_id');
            $table->date('date_in');
            $table->date('date_out');
            $table->integer('no_of_nights');
            $table->string('transaction_no', 60);
            $table->integer('total');
            $table->timestamps();

            $table->foreign('customer_id')
            ->references('id')
            ->on('customers')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('hotel_id')
            ->references('id')
            ->on('hotels')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('room_id')
            ->references('id')
            ->on('rooms')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('booking_status_id')
            ->references('id')
            ->on('booking_statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('payment_id')
            ->references('id')
            ->on('payments')
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
        Schema::dropIfExists('bookings');
    }
}
