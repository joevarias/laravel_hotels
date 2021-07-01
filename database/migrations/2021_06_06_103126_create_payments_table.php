<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_status_id')->default(1);
            $table->unsignedBigInteger('payment_method_id');
            $table->string('credit_card_no')->default(2222222222);
            $table->timestamps();

            $table->foreign('customer_id')
            ->references('id')
            ->on('customers')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('payment_status_id')
            ->references('id')
            ->on('payment_statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('payment_method_id')
            ->references('id')
            ->on('payment_methods')
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
        Schema::dropIfExists('payments');
    }
}
