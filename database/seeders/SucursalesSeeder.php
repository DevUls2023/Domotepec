<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create([

            'nombre' => 'Ilopango',
            'empresa' => '1',
            'direccion' => 'Ilopango',
            'telefono' => '+5036004-3157',
            'gerente' => 'Leonel',

        ]);

        Sucursal::create([

            'nombre' => 'La Libertad',
            'empresa' => '1',
            'direccion' => 'La Libertad',
            'telefono' => '+5036004-3157',
            'gerente' => 'Leonel',

        ]);
    }
}