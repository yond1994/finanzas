<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'id_user' => 1,
                'saldo' => 1,
                'movimientos' => 1,
                'categoria' => 1,
                'cuentas' => 1,
                'usuario' => 1,
                'transferencia' => 1,
                'tours' => 1,
                'm_futuros' => 1,
                'bitacora' => 1,
                'adjuntos' => 1,
                'pdf' => 1
            ],
            [
                'id' => 9,
                'id_user' => 11,
                'saldo' => 1,
                'movimientos' => 1,
                'categoria' => 1,
                'cuentas' => 1,
                'usuario' => 2,
                'transferencia' => 1,
                'tours' => 1,
                'm_futuros' => 1,
                'bitacora' => 1,
                'adjuntos' => 1,
                'pdf' => 8
            ],
            [
                'id' => 10,
                'id_user' => 12,
                'saldo' => 8,
                'movimientos' => 8,
                'categoria' => 8,
                'cuentas' => 8,
                'usuario' => 0,
                'transferencia' => 8,
                'tours' => 0,
                'm_futuros' => 0,
                'bitacora' => 0,
                'adjuntos' => 3,
                'pdf' => 8
            ],
            [
                'id' => 11,
                'id_user' => 13,
                'saldo' => 1,
                'movimientos' => 1,
                'categoria' => 1,
                'cuentas' => 1,
                'usuario' => 1,
                'transferencia' => 1,
                'tours' => 1,
                'm_futuros' => 1,
                'bitacora' => 1,
                'adjuntos' => 1,
                'pdf' => 8
            ],
            [
                'id' => 12,
                'id_user' => 14,
                'saldo' => null,
                'movimientos' => null,
                'categoria' => null,
                'cuentas' => null,
                'usuario' => null,
                'transferencia' => null,
                'tours' => null,
                'm_futuros' => null,
                'bitacora' => null,
                'adjuntos' => null,
                'pdf' => null
            ],
            [
                'id' => 13,
                'id_user' => 15,
                'saldo' => null,
                'movimientos' => null,
                'categoria' => null,
                'cuentas' => null,
                'usuario' => null,
                'transferencia' => null,
                'tours' => null,
                'm_futuros' => null,
                'bitacora' => null,
                'adjuntos' => null,
                'pdf' => null
            ],
            [
                'id' => 14,
                'id_user' => 16,
                'saldo' => null,
                'movimientos' => null,
                'categoria' => null,
                'cuentas' => null,
                'usuario' => null,
                'transferencia' => null,
                'tours' => null,
                'm_futuros' => null,
                'bitacora' => null,
                'adjuntos' => null,
                'pdf' => 8
            ],
            [
                'id' => 15,
                'id_user' => 17,
                'saldo' => null,
                'movimientos' => null,
                'categoria' => null,
                'cuentas' => null,
                'usuario' => null,
                'transferencia' => null,
                'tours' => null,
                'm_futuros' => null,
                'bitacora' => null,
                'adjuntos' => null,
                'pdf' => null
            ]
        ]);
    }
}
