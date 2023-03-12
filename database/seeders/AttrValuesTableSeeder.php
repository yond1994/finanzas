<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AttrValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attr_values')->insert([
            [
                'id' => 101,
                'name' => 'Booking.com',
                'value' => 'comisiones recibidas por el sistema de afiliados de booking.com',
                'id_categorie' => 45
            ],
            [
                'id' => 102,
                'name' => 'Momondo',
                'value' => 'comisiones recibidas por el sistema de afiliados de momondo.com',
                'id_categorie' => 45
            ],
            [
                'id' => 103,
                'name' => 'Adsense',
                'value' => 'Comisiones recibidas por sistema Adsense',
                'id_categorie' => 45
            ],
            [
                'id' => 104,
                'name' => 'Etravel solution',
                'value' => '1',
                'id_categorie' => 47
            ],
            [
                'id' => 105,
                'name' => 'Bedsonline',
                'value' => '1',
                'id_categorie' => 47
            ],
            [
                'id' => 106,
                'name' => 'Booking.com',
                'value' => '1',
                'id_categorie' => 47
            ],
            [
                'id' => 107,
                'name' => 'Otro',
                'value' => '1',
                'id_categorie' => 47
            ],
            [
                'id' => 108,
                'name' => 'Contravel',
                'value' => '1',
                'id_categorie' => 48
            ],
            [
                'id' => 109,
                'name' => 'Directo aerolínea',
                'value' => '1',
                'id_categorie' => 48
            ],
            [
                'id' => 110,
                'name' => 'Otro',
                'value' => '1',
                'id_categorie' => 48
            ],
            [
                'id' => 111,
                'name' => 'SIM Rooming',
                'value' => '1',
                'id_categorie' => 49
            ],
            [
                'id' => 112,
                'name' => 'April',
                'value' => '1',
                'id_categorie' => 50
            ],
            [
                'id' => 113,
                'name' => 'Otro',
                'value' => '1',
                'id_categorie' => 50
            ],
            [
                'id' => 114,
                'name' => 'Tour cancelado',
                'value' => '1',
                'id_categorie' => 51
            ],
            [
                'id' => 115,
                'name' => 'Cancelación del cliente',
                'value' => '1',
                'id_categorie' => 51
            ],
            [
                'id' => 116,
                'name' => 'Reembolso por incentivo',
                'value' => '1',
                'id_categorie' => 51
            ],
            [
                'id' => 117, 
                'name' => 'Jorge Vega', 
                'value' => 'Director general', 
                'id_categorie' => 52
            ],
            [
                'id' => 118, 
                'name' => 'Karla Guillen', 
                'value' => 'Directora comercial', 
                'id_categorie' => 52
            ],
            [
                'id' => 119, 
                'name' => 'Mayra Peña', 
                'value' => 'Directora de finanzas', 
                'id_categorie' => 52
            ],
            [
                'id' => 120, 
                'name' => 'Diana Meza', 
                'value' => 'Atención al viajero', 
                'id_categorie' => 52
            ],
            [
                'id' => 121, 
                'name' => 'Denisse Molinet', 
                'value' => 'Atención al viajero', 
                'id_categorie' => 52
            ],
            [
                'id' => 122, 
                'name' => 'Jose Lopez', 
                'value' => 'Atención al viajero', 
                'id_categorie' => 52
            ],
            [
                'id' => 123, 
                'name' => 'Leifer Mendez', 
                'value' => 'Programador', 
                'id_categorie' => 52
            ],
            [
                'id' => 124, 
                'name' => 'Leticia Manjón', 
                'value' => 'Staff', 
                'id_categorie' => 52
            ],
            [
                'id' => 125, 
                'name' => 'Alvaro Moneo', 
                'value' => 'Staff', 
                'id_categorie' => 52
            ],
            [
                'id' => 126, 
                'name' => 'Renta', 'value'
                 => '1', 
                 'id_categorie' => 53
                ],
            [
                'id' => 127, 
                'name' => 'Luz y agua'
                , 'value' => '1', 
                'id_categorie' => 53
            ],
            [
                'id' => 128,
                'name' => 'Limpieza',
                'value' => '1',
                'id_categorie' => 53,
            ],
            [
                'id' => 129,
                'name' => 'Telefonía e internet',
                'value' => '1',
                'id_categorie' => 53,
            ],
            [
                'id' => 130,
                'name' => 'Suministros de oficina',
                'value' => '1',
                'id_categorie' => 53,
            ],
            [
                'id' => 131,
                'name' => 'Otro',
                'value' => '1',
                'id_categorie' => 53,
            ],
            [
                'id' => 132,
                'name' => 'Contador Trillo',
                'value' => '1',
                'id_categorie' => 54,
            ],
            [
                'id' => 133,
                'name' => 'Eventuales',
                'value' => '1',
                'id_categorie' => 54,
            ],
            [
                'id' => 134,
                'name' => 'Comisiones Paypal',
                'value' => '1',
                'id_categorie' => 55,
            ],
            [
                'id' => 135,
                'name' => 'Comisiones bancos',
                'value' => '1',
                'id_categorie' => 55,
            ],
            [
                'id' => 136,
                'name' => 'Pago intereses',
                'value' => '1',
                'id_categorie' => 55,
            ],
            [
                'id' => 137,
                'name' => 'Viáticos en México',
                'value' => '1',
                'id_categorie' => 56,
            ],
            [
                'id' => 138,
                'name' => 'Facebook',
                'value' => '1',
                'id_categorie' => 57,
            ],
            [
                'id' => 139,
                'name' => 'Adwords',
                'value' => '1',
                'id_categorie' => 57,
            ],
            [
                'id' => 140,
                'name' => 'Patrocinios',
                'value' => '1',
                'id_categorie' => 57,
            ],
            [
                'id' => 141,
                'name' => 'Hospedaje',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 142,
                'name' => 'Convenios aéreos',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 143,
                'name' => 'Tickets de tren',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 144,
                'name' => 'Otro transporte',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 145,
                'name' => 'Seguros',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 146,
                'name' => 'Pago guías principales',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 147,
                'name' => 'Viáticos de guía y staff',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 148,
                'name' => 'Walking tours',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 149,
                'name' => 'Otras actividades incluidas ( cenas, bebidas, paseos,etc)',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 150,
                'name' => 'Imprevistos durante el viaje',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 151,
                'name' => 'Hoteles',
                'value' => '1',
                'id_categorie' => 59,
            ],
            [
                'id' => 152,
                'name' => 'Vuelos',
                'value' => '1',
                'id_categorie' => 59,
            ],
            [
                'id' => 153,
                'name' => 'Paquetes nacionales o internacionales',
                'value' => '1',
                'id_categorie' => 59,
            ],
            [
                'id' => 154,
                'name' => 'Seguros',
                'value' => '1',
                'id_categorie' => 59,
            ],
            [
                'id' => 155,
                'name' => 'Mailchimp',
                'value' => '1',
                'id_categorie' => 60,
            ],
            [
                'id' => 156,
                'name' => 'Jotform',
                'value' => '1',
                'id_categorie' => 60,
            ],
            [
                'id' => 157,
                'name' => 'Dropbox',
                'value' => '1',
                'id_categorie' => 60,
            ],
            [
                'id' => 158,
                'name' => 'CFDI',
                'value' => '1',
                'id_categorie' => 60,
            ],
            [
                'id' => 159,
                'name' => 'Envato (códigos, plugins,etc.)',
                'value' => '1',
                'id_categorie' => 61,
            ],
            [
                'id' => 160,
                'name' => 'Freelancer',
                'value' => '1',
                'id_categorie' => 61,
            ],
            [
                'id' => 161,
                'name' => 'Compra de software y licencias',
                'value' => '1',
                'id_categorie' => 61,
            ],
            [
                'id' => 162,
                'name' => 'Equipo de computo',
                'value' => '1',
                'id_categorie' => 62,
            ],
            [
                'id' => 163,
                'name' => 'Softwre y reparación',
                'value' => '1',
                'id_categorie' => 62,
            ],
            [
                'id' => 164,
                'name' => 'Mobiliario de oficina',
                'value' => '1',
                'id_categorie' => 62,
            ],
            [
                'id' => 165,
                'name' => 'Imprevistos',
                'value' => '1',
                'id_categorie' => 63,
            ],
            [
                'id' => 166,
                'name' => 'Multas',
                'value' => '1',
                'id_categorie' => 63,
            ],
            [
                'id' => 167, 
                'name' => 'Declaraciones de IVA', 
                'value' => '1', 
                'id_categorie' => 64
            ],
            [
                'id' => 168, 
                'name' => 'Declaraciones de ISR', 
                'value' => '1', 
                'id_categorie' => 64
            ],
            [
                'id' => 169, 
                'name' => 'Declaración anual', 
                'value' => '1', 
                'id_categorie' => 64
            ],
            [
                'id' => 170, 
                'name' => 'Comisiones por facturación', 
                'value' => '1', 
                'id_categorie' => 64
            ],
            [
                'id' => 171, 
                'name' => 'Otras', 
                'value' => '1', 
                'id_categorie' => 60
            ],
            [
                'id' => 172, 
                'name' => 'Incentivo facebook', 
                'value' => 'Ganador quincenal', 
                'id_categorie' => 52
            ],
            [
                'id' => 173, 
                'name' => 'Comisiones por ventas', 
                'value' => 'Comisiones extras por ventas de vuelos, 
                hoteles o polizas'
                , 
                'id_categorie' => 52],
            [
                'id' => 175, 
                'name' => 'Comisiones por transacciones', 
                'value' => '1', 
                'id_categorie' => 55
            ],
            [
                'id' => 176, 
                'name' => 'Desde Paypal', 
                'value' => 'a Cta. moral', 
                'id_categorie' => 68
            ],
            [
                'id' => 177, 
                'name' => 'Desde Cta. moral', 
                'value' => 'a Trillo', 
                'id_categorie' => 68
            ],
            [
                'id' => 178, 
                'name' => 'Desde Trillo', 
                'value' => 'a Cta. Mayra', 
                'id_categorie' => 68
            ],
            [
                'id' => 179, 
                'name' => 'Desde Paypal', 
                'value' => '1', 
                'id_categorie' => 69
            ],
            [
                'id' => 180, 
                'name' => 'Desde Cta. Moral', 
                'value' => '1', 
                'id_categorie' => 69
            ],
            [
                'id' => 181, 
                'name' => 'Desde Trillo', 
                'value' => '1', 
                'id_categorie' => 69
            ],
            [
                'id' => 182, 
                'name' => 'Cargos comisiones varias', 
                'value' => '1', 
                'id_categorie' => 55
            ],
            [
                'id' => 183, 
                'name' => 'Comisiones por cargo', 
                'value' => '1', 
                'id_categorie' => 67
            ],
            [
                'id' => 184, 
                'name' => 'Reembolso operadores', 
                'value' => '1', 
                'id_categorie' => 67
            ],
            [
                'id' => 185, 
                'name' => 'Comisiones Trillo', 
                'value' => '1', 
                'id_categorie' => 55
            ],
            [
                'id' => 186, 
                'name' => 'Jhonathan Suarez', 
                'value' => 'Programador', 
                'id_categorie' => 52
            ],
            [
                'id' => 187, 
                'name' => 'Préstamos', 
                'value' => 'Préstamos a pagar en 4 Quincenas', 
                'id_categorie' => 52
            ],
            [
                'id' => 188, 
                'name' => 'Préstamos', 
                'value' => 'Pago de Préstamos', 
                'id_categorie' => 67
            ],
            [
                'id' => 189, 
                'name' => 'Lorena Gomez', 
                'value' => 'Kolmena', 
                'id_categorie' => 52
            ],
            [
                'id' => 190, 
                'name' => 'Hugo Ramírez', 
                'value' => 'Prácticas', 
                'id_categorie' => 52
            ],
            [
                'id' => 191,
                'name' => 'Vídeos Alex Salinas',
                'value' => '1',
                'id_categorie' => 57,
            ],
            [
                'id' => 192,
                'name' => 'Gorras',
                'value' => '1',
                'id_categorie' => 70,
            ],
            [
                'id' => 193,
                'name' => 'Plumas',
                'value' => '1',
                'id_categorie' => 70,
            ],
            [
                'id' => 194,
                'name' => 'Llaveros',
                'value' => '1',
                'id_categorie' => 70,
            ],
            [
                'id' => 195,
                'name' => 'Postapasaportes',
                'value' => '1',
                'id_categorie' => 70,
            ],
            [
                'id' => 196,
                'name' => 'Botellas',
                'value' => '1',
                'id_categorie' => 70,
            ],
            [
                'id' => 197,
                'name' => 'Otros',
                'value' => '1',
                'id_categorie' => 70,
            ],
            [
                'id' => 198,
                'name' => 'Ganador Links',
                'value' => 'Ganador de links por mes',
                'id_categorie' => 52,
            ],
            [
                'id' => 199,
                'name' => 'Souvenirs',
                'value' => '1',
                'id_categorie' => 58,
            ],
            [
                'id' => 200,
                'name' => 'Estefany Martinez',
                'value' => 'Tours Irapuato',
                'id_categorie' => 52,
            ],
            [
                'id' => 201,
                'name' => 'Desde cta Jorge',
                'value' => '1',
                'id_categorie' => 69,
            ],
            [
                'id' => 202,
                'name' => 'Laurenyi Jaimes',
                'value' => 'Tours Irapuato',
                'id_categorie' => 52,
            ],
            [
                'id' => 203,
                'name' => 'Camila Olmos',
                'value' => 'Mochileros apoyo verano',
                'id_categorie' => 52,
            ],
            [
                'id' => 204,
                'name' => 'Desde Cuenta España',
                'value' => '1',
                'id_categorie' => 69,
            ],
            [
                'id' => 205,
                'name' => 'Penelope Castro',
                'value' => 'Prácticas',
                'id_categorie' => 52,
            ],
            [
                'id' => 206,
                'name' => 'Evelyn Coronado',
                'value' => 'Prácticas',
                'id_categorie' => 52,
            ],
            [
                'id' => 207,
                'name' => 'ISN',
                'value' => '1',
                'id_categorie' => 71,
            ],
            [
                'id' => 208,
                'name' => 'IMSS',
                'value' => '1',
                'id_categorie' => 71,
            ],
            [
                'id' => 209,
                'name' => 'Canva',
                'value' => '1',
                'id_categorie' => 60,
            ],
            [
                'id' => 211,
                'name' => 'Sobrante Viaticos',
                'value' => '1',
                'id_categorie' => 67,
            ],
            [
                'id' => 213,
                'name' => 'Comisiones Hola Sim',
                'value' => '1',
                'id_categorie' => 72,
            ],
            [
                'id' => 214,
                'name' => 'Comisiones Bedsonline',
                'value' => '1',
                'id_categorie' => 72,
            ],
            [
                'id' => 215,
                'name' => 'Comisiones Contravel',
                'value' => '1',
                'id_categorie' => 72,
            ],
            [
                'id' => 216,
                'name' => 'Comisiones Hoteldo',
                'value' => '1',
                'id_categorie' => 72,
            ],
            [
                'id' => 217,
                'name' => 'Godaddy',
                'value' => '1',
                'id_categorie' => 61,
            ],
            [
                'id' => 218,
                'name' => 'Bono',
                'value' => '1',
                'id_categorie' => 58,
            ]
        ]);
    }
}