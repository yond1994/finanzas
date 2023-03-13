<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tours')->insert([
            [
                'id' => 12,
                'name' => 'Exploración Perú',
                'description' => 'Tour Exploración Perú'
            ],
            [
                'id' => 14,
                'name' => 'Mega Tour de Verano',
                'description' => '26 días, 15 ciudades y 10 Países por Europa'
            ],
            [
                'id' => 17,
                'name' => 'Invierno en Europa',
                'description' => '17 días, 9 ciudades y 6 Países por Europa'
            ],
            [
                'id' => 18,
                'name' => 'Oktoberfest',
                'description' => '17 días, 6 ciudades y países por Europa'
            ]
        ]);
    }
}
