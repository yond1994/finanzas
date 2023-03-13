<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'id' => 23,
                'name' => 'Caja Grande',
                'number' => '2',
                'type' => 'corriente',
            ],
            [
                'id' => 24,
                'name' => 'Caja Chica',
                'number' => '3',
                'type' => 'corriente',
            ],
            [
                'id' => 30,
                'name' => 'Stripe España',
                'number' => '1',
                'type' => 'corriente',
            ],
            [
                'id' => 31,
                'name' => 'Compropago',
                'number' => '1',
                'type' => 'corriente',
            ],
            [
                'id' => 32,
                'name' => 'Mercadopago',
                'number' => '5',
                'type' => 'corriente',
            ],
        ]);
    }
}
