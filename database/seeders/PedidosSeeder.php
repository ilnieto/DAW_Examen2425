<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Pedido;
class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pedido::create([
            'user_id' => 1,

        ]);
        Pedido::create([
            'user_id' => 2,

        ]);
        Pedido::create([
            'user_id' => 2,

        ]);
    }


}
