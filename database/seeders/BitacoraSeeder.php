<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BitacoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bitacora')->insert([
            [
                'id' => 1,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 51
            ],
            [
                'id' => 2,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 53
            ],
            [
                'id' => 3,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 37
            ],
            [
                'id' => 4,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 25
            ],
            [
                'id' => 5,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 21
            ],
            [
                'id' => 6,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 60
            ],
            [
                'id' => 7,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 59
            ],
            [
                'id' => 8,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 58
            ],
            [
                'id' => 9,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 57,
            ],
            [
                'id' => 10,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 56,
            ],
            [
                'id' => 11,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 55,
            ],
            [
                'id' => 12,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 54,
            ],
            [
                'id' => 13,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 52,
            ],
            [
                'id' => 14,
                'created_date' => '2019-10-27 00:10:00',
                'type' => 'delete',
                'id_user' => 10,
                'activity' => 'tours',
                'id_activity' => 50,
            ],
            [
                'id' => 15,
                'created_date' => '2019-12-08 00:12:00',
                'type' => 'delete',
                'id_user' => 1,
                'activity' => 'categorias',
                'id_activity' => 44,
            ],
            [
                'id' => 16,
                'created_date' => '2019-12-08 00:12:00',
                'type' => 'delete',
                'id_user' => 1,
                'activity' => 'categorias',
                'id_activity' => 42,
            ],
            [
                'id' => 17,
                'created_date' => '2019-12-08 00:12:00',
                'type' => 'add',
                'id_user' => 1,
                'activity' => 'movimiento',
                'id_activity' => 1,
            ],
            [
                'id' => 18, 
                'created_date' => '2019-12-08 00:12:00', 
                'type' => 'delete', 
                'id_user' => 1, 
                'activity' => 'usuario', 
                'id_activity' => 10
            ],
            [
                'id' => 19, 
                'created_date' => '2019-12-08 00:12:00', 
                'type' => 'delete', 
                'id_user' => 1, 
                'activity' => 'usuario', 
                'id_activity' => 18
            ],
       
        ]);
    }
}
