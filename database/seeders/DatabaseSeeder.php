<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(CitiesTableSeeder::class);
        // $this->call(HotelsTableSeeder::class);
        // $this->call(RoomTypesTableSeeder::class);
        // $this->call(BookingStatusesTableSeeder::class);
        // $this->call(PaymentMethodsTableSeeder::class);
        // $this->call(PaymentStatusesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
    }
}
