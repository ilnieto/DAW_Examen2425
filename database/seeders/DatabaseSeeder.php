<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Añadir seeders para que los ejecute :)
        $this->call([
            AdminUserSeeder::class,
            CartasSeeder::class,
            PedidosSeeder::class,
            DetallesPedidosSeeder::class
        ]);

        // User::factory(10)->create();
    }
}
