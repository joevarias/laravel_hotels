<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id')->default(1);
            $table->unsignedBigInteger('role_id')->default(3);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('emp_username')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('hotel_id')
            ->references('id')
            ->on('hotels')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
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
        Schema::dropIfExists('employees');
    }
}
