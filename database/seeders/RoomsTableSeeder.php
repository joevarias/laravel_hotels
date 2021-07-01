<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([

        	// City Gardens
            // Standard
            ['hotel_id' => 1, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 2750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 2750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 2750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 2750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 2750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 1, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 2985, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 2985, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 2985, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 2985, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 2985, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 1, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 3463, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 3463, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 3463, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 3463, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 1, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 3463, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// The Peninsula
            // Standard
            ['hotel_id' => 2, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 6242, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 6242, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 6242, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 6242, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 6242, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 2, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 6669, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 6669, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 6669, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 6669, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 6669, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 2, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 9405, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 9405, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 9405, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 9405, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 2, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 9405, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// Manila Hotel
            // Standard
            ['hotel_id' => 3, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 3577, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 3577, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 3577, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 3577, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 3577, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 3, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 4252, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 4252, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 4252, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 4252, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 4252, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 3, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 5154, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 5154, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 5154, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 5154, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 3, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 5154, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// Manila Lotus
            // Standard
            ['hotel_id' => 4, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 2387, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 2387, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 2387, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 2387, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 2387, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 4, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 2679, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 2679, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 2679, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 2679, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 2679, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 4, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 3424, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 3424, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 3424, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 3424, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 4, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 3424, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

        	// Seda Vertis
            // Standard
            ['hotel_id' => 5, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 4624, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 4624, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 4624, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 4624, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 4624, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 5, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 5440, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 5440, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 5440, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 5440, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 5440, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 5, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 7565, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 7565, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 7565, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 7565, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 5, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 7565, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// Novotel
            // Standard
            ['hotel_id' => 6, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 5750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 5750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 5750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 5750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 5750, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 6, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 6250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 6250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 6250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 6250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 6250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 6, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 7250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 7250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 7250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 7250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 6, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 7250, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// Sofitel
            // Standard
            ['hotel_id' => 7, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 5300, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 5300, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 5300, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 5300, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 5300, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 7, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 6800, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 6800, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 6800, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 6800, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 6800, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 7, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 9000, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 9000, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 9000, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 9000, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 7, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 9000, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// Conrad
            // Standard
            ['hotel_id' => 8, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 8226, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 8226, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 8226, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 8226, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 8226, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 8, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 9140, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 9140, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 9140, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 9140, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 9140, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 8, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 10914, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 10914, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 10914, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 10914, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 8, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 10914, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// Shangri-La
            // Standard
            ['hotel_id' => 9, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 6965, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 6965, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 6965, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 6965, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 6965, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 9, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 11400, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 11400, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 11400, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 11400, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 11400, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 9, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 16900, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 16900, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 16900, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 16900, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 9, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 16900, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        	// Ascott
            // Standard
            ['hotel_id' => 10, 'room_type_id' => 1, 'room_no' => 201, 'room_floor' => 2, 'rate' => 8320, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 1, 'room_no' => 202, 'room_floor' => 2, 'rate' => 8320, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 1, 'room_no' => 203, 'room_floor' => 2, 'rate' => 8320, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 1, 'room_no' => 204, 'room_floor' => 2, 'rate' => 8320, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 1, 'room_no' => 205, 'room_floor' => 2, 'rate' => 8320, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Deluxe
            ['hotel_id' => 10, 'room_type_id' => 2, 'room_no' => 301, 'room_floor' => 3, 'rate' => 8760, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 2, 'room_no' => 302, 'room_floor' => 3, 'rate' => 8760, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 2, 'room_no' => 303, 'room_floor' => 3, 'rate' => 8760, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 2, 'room_no' => 304, 'room_floor' => 3, 'rate' => 8760, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 2, 'room_no' => 305, 'room_floor' => 3, 'rate' => 8760, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            // Queen
            ['hotel_id' => 10, 'room_type_id' => 3, 'room_no' => 401, 'room_floor' => 4, 'rate' => 12680, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 3, 'room_no' => 402, 'room_floor' => 4, 'rate' => 12680, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 3, 'room_no' => 403, 'room_floor' => 4, 'rate' => 12680, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 3, 'room_no' => 404, 'room_floor' => 4, 'rate' => 12680, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['hotel_id' => 10, 'room_type_id' => 3, 'room_no' => 405, 'room_floor' => 4, 'rate' => 12680, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


        ]);
    }
}
