<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Carta;

class CartasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carta::create([
            'nombre' => 'Carta',
            'precio'=> rand(5,50),
            'tipo' => 'normal',
            'rareza' => 'a',
            'habilidad' => null,
            'stock' => 1
        ]);
        Carta::create([
            'nombre' => 'Carta2',
            'precio'=> rand(5,50),
            'tipo' => 'rara',
            'rareza' => 'b',
            'habilidad' => 'magia',
            'stock' => 3
        ]);

        Carta::create([
            'nombre' => 'Carta3',
            'precio'=> rand(5,50),
            'tipo' => 'especial',
            'rareza' => 'c',
            'habilidad' => null,
            'stock' => 10
        ]);
    }
}

