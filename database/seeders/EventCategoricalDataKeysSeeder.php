<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class EventCategoricalDataKeysSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('event_categorical_data_keys')->insert([
            [
                'event_id' => 1,
                'data_key' => 'name',
                'data_type' => 1, 
                'key_options' => '',
                'status' => 1,
                'is_mandatory' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'event_id' => 1,
                'data_key' => 'gender',
                'data_type' => 2, 
                'key_options' => 'Male,Female,Other',
                'status' => 1,
                'is_mandatory' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'event_id' => 1,
                'data_key' => 'type',
                'data_type' => 3, 
                'key_options' => 'Indoor,OutDoor,Both',
                'status' => 1,
                'is_mandatory' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'event_id' => 1,
                'data_key' => 'state',
                'data_type' => 4, // select input
                'key_options' => 'Punjab,Uttarakhand,Delhi,MP',
                'status' => 1,
                'is_mandatory' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
