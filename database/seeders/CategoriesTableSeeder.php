<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'transferencia',
                'description' => 'transferencia',
                'type' => 'add'
            ],
            [
                'id' => 45,
                'name' => 'Afiliados y publicidad',
                'description' => 'Comisiones recibidas por sistemas de afiliados y publicidad',
                'type' => 'add'
            ],
            [
                'id' => 46,
                'name' => 'Pago de reservación de tour',
                'description' => 'Pago ',
                'type' => 'add'
            ],
            [
                'id' => 47,
                'name' => 'Reservaciones de hoteles',
                'description' => 'Reservas de hoteles para publico en general',
                'type' => 'add'
            ],
            [
                'id' => 48,
                'name' => 'Reservaciones de vuelos',
                'description' => 'Reservaciones de vuelos para publico en general',
                'type' => 'add'
            ],
            [
                'id' => 49,
                'name' => 'Venta de articulos de viaje',
                'description' => 'Venta de articulos de viaje para publico en general',
                'type' => 'add'
            ],
            [
                'id' => 50,
                'name' => 'Seguros de viaje',
                'description' => 'Seguros de viaje para publico en general',
                'type' => 'add'
            ],
            [
                'id' => 51,
                'name' => 'Reembolsos',
                'description' => 'Reembolso de tours o servicios adquiridos',
                'type' => 'out'
            ],
            [
                'id' => 52,
                'name' => 'Nóminas',
                'description' => 'Pago de nominas',
                'type' => 'out'
            ],
            [
                'id' => 53,
                'name' => 'Gastos de oficina',
                'description' => 'Gastos fijos y variables de oficina',
                'type' => 'out'
            ],
            [
                'id' => 54,
                'name' => 'Honorarios externos',
                'description' => 'Pago de colaboradores',
                'type' => 'out'
            ],
            [
                'id' => 55,
                'name' => 'Gastos financieros',
                'description' => 'Comisiones e intereses de plataformas y bancos',
                'type' => 'out'
            ],
            [
                'id' => 56,
                'name' => 'Gastos operativos',
                'description' => 'Gastos operativos',
                'type' => 'out'
            ],
            [
                'id' => 57, 
                'name' => 'Publicidad', 
                'description' => 'Pago de publicidad', 
                'type' => 'out'
            ],
            [
                'id' => 58, 
                'name' => 'Gastos de tour', 
                'description' => 'Pagos para planeación y logística de tour', 
                'type' => 'out'
            ],
            [
                'id' => 59, 
                'name' => 'Pago a operadores', 
                'description' => 'Pago de reservas a público en general', 
                'type' => 'out'
            ],
            [
                'id' => 60, 
                'name' => 'Herramientas online', 
                'description' => 'Pago de herramientas online', 
                'type' => 'out'
            ],
            [
                'id' => 61, 
                'name' => 'Proyectos en desarrollo', 
                'description' => 'Pago de herramientas y servicios para proyectos en desarrollo', 
                'type' => 'out'
            ],
            [
                'id' => 62, 
                'name' => 'Mobiliario y equipo de oficina', 
                'description' => 'Compra o gasto de reparación en equipo y mobiliario de oficina', 
                'type' => 'out'
            ],
            [
                'id' => 63, 
                'name' => 'Otros gastos', 
                'description' => 'Pago de gastos imprevistos', 
                'type' => 'out'
            ],
            [
                'id' => 64, 
                'name' => 'Impuestos', 
                'description' => 'Pago de impuestos', 
                'type' => 'out'
            ],
            [
                'id' => 65, 
                'name' => 'Saldo inicial', 
                'description' => 'Saldo de cuentas mes de junio', 
                'type' => 'add'
            ],
            [
                'id' => 66, 
                'name' => 'Desconocidos', 
                'description' => 'Cargos a cuenta desconocidos', 
                'type' => 'out'
            ],
            [
                'id' => 67, 
                'name' => 'Reembolsos (ingreso)', 
                'description' => 'Reembolsos varios', 
                'type' => 'add'
            ],
            [
                'id' => 68, 
                'name' => 'Transferencia de saldos', 
                'description' => 'Transferencias de una cuenta a otra', 
                'type' => 'out'
            ],
            [
                'id' => 69, 
                'name' => 'Recepción de saldo', 
                'description' => 'Recepción de saldo por transferencia', 
                'type' => 'add'
            ],
            [
                'id' => 70, 
                'name' => 'Accesorios', 
                'description' => 'Compra de regalos.', 
                'type' => 'out'
            ],
            [
                'id' => 71, 
                'name' => 'IMSS', 
                'description' => 'Cuotas de imss', 
                'type' => 'out'
            ],
            [
                'id' => 72, 
                'name' => 'Comisiones', 
                'description' => 'Comisiones de operadores', 
                'type' => 'add'
            ],
            [
                'id' => 73, 
                'name' => 'ComproPago', 
                'description' => 'ComproPago', 
                'type' => 'out'
            ]
        ]);
    }
}
