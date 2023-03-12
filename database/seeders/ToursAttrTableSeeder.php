<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToursAttrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tours_attr')->insert([
            [
                'id' => 32,
                'date' => '2017-10-19 00:00:00',
                'price' => 1,
                'id_tours' => 12,
            ],
            [
                'id' => 34,
                'date' => '2018-07-02 00:00:00',
                'price' => 1,
                'id_tours' => 14,
            ],
            [
                'id' => 38,
                'date' => '2017-09-20 00:00:00',
                'price' => 1,
                'id_tours' => 18,
            ],
            [
                'id' => 79,
                'date' => '2018-07-09 00:00:00',
                'price' => 1,
                'id_tours' => 14,
            ],
            [
                'id' => 80,
                'date' => '2017-09-25 00:00:00',
                'price' => 1,
                'id_tours' => 18,
            ],
            [
                'id' => 96,
                'date' => '2018-09-20 00:00:00',
                'price' => 1,
                'id_tours' => 18,
            ],
            [
                'id' => 97,
                'date' => '2018-10-19 00:00:00',
                'price' => 1,
                'id_tours' => 12,
            ],
            [
                'id' => 98,
                'date' => '2017-12-14 00:00:00',
                'price' => 1,
                'id_tours' => 17,
            ],
            [
                'id' => 99,
                'date' => '2018-12-17 00:00:00',
                'price' => 1,
                'id_tours' => 17,
            ],
            [
                'id' => 127,
                'date' => '2018-12-18 00:00:00',
                'price' => 1,
                'id_tours' => 17,
            ],
            [
                'id' => 128,
                'date' => '2018-09-25 00:00:00',
                'price' => 1,
                'id_tours' => 18,
            ]
        ]);
    }
}
