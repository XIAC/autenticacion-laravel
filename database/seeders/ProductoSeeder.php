<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productos')->insert([
            'nombre' => 'Monitor',
            'descripcion' => 'LG',
            'monto' => 1050
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Celular',
            'descripcion' => 'Iphonw',
            'monto' => 4000
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Lavadora',
            'descripcion' => 'Astra',
            'monto' => 3500
        ]);
    }
}
