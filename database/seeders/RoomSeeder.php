<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            ['capacity' => 50, 'room_num' => '101', 'room_type' => 'large', 'location' => 'Floor 1'],
            ['capacity' => 30, 'room_num' => '102', 'room_type' => 'medium', 'location' => 'Floor 1'],
            ['capacity' => 20, 'room_num' => '103', 'room_type' => 'small', 'location' => 'Floor 1'],
            ['capacity' => 15, 'room_num' => '104', 'room_type' => 'introvert', 'location' => 'Floor 1'],
            ['capacity' => 40, 'room_num' => '201', 'room_type' => 'large', 'location' => 'Floor 2'],
            ['capacity' => 25, 'room_num' => '202', 'room_type' => 'medium', 'location' => 'Floor 2'],
            ['capacity' => 18, 'room_num' => '203', 'room_type' => 'small', 'location' => 'Floor 2'],
            ['capacity' => 12, 'room_num' => '204', 'room_type' => 'introvert', 'location' => 'Floor 2'],
            ['capacity' => 50, 'room_num' => '301', 'room_type' => 'large', 'location' => 'Floor 3'],
            ['capacity' => 30, 'room_num' => '302', 'room_type' => 'medium', 'location' => 'Floor 3'],
        ]);
    }
}
