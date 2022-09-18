<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name' => 'Oficina de Bootstrap',
                'eventdate' => '2022/12/10 09:00:00',],
            [
                'name' => 'Palestra',
                'eventdate' => '2022/12/10 10:00:00',
            ],
            [
                'name' => 'Oficina Block Chain',
                'eventdate' => '2022/12/11 10:00:00',
            ]
        ]);
    }
}
