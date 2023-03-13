<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SummaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('summary')->insert([
            'id' => 1,
            'created_at' => '2019-12-07 23:00:00',
            'concept' => 'nueva entrada',
            'type' => 'add',
            'amount' => 200,
            'tax' => 0,
            'account_id' => 23,
            'categories_id' => 45,
            'factura' => '0',
            'id_attr' => 102,
            'id_transfer' => null,
            'tours_id' => null,
            'id_attr_tours' => 127,
            'id_autor' => 1,
            'future' => '1',
        ]);
    }
}
