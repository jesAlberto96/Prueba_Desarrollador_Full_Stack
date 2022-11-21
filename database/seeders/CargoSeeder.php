<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            'name' => "Director Creativo",
            'role_id' => 1,
            'area_id' => 1,
        ]);

        Cargo::create([
            'name' => "Copy",
            'role_id' => 2,
            'area_id' => 1,
        ]);
        
        Cargo::create([
            'name' => "Community Manager",
            'role_id' => 2,
            'area_id' => 1,
        ]);
        
        Cargo::create([
            'name' => "Diseñador Senior",
            'role_id' => 2,
            'area_id' => 1,
        ]);
        
        Cargo::create([
            'name' => "Diseñador Jr",
            'role_id' => 2,
            'area_id' => 1,
        ]);
        
        Cargo::create([
            'name' => "Diseñador Gráfico",
            'role_id' => 2,
            'area_id' => 1,
        ]);
        
        Cargo::create([
            'name' => "Realizador Audiovisual",
            'role_id' => 2,
            'area_id' => 1,
        ]);
    }
}
