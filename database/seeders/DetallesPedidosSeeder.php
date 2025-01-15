<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Carta;
use App\Models\Pedido;
use App\Models\DetallePedido;
class DetallesPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crear usuario

        $user = User::create([
            'name' => 'Cliente2',
            'email' => 'cliente2@tienda.com',
            'password' => bcrypt('password'),
        ]);

        //crear carta
        $carta1 = Carta::create([
            'nombre' => 'Carta_nueva1',
            'precio'=> rand(5,50),
            'tipo' => 'normal',
            'rareza' => 'a',
            'habilidad' => null,
            'stock' => 10
        ]);

        $carta2 = Carta::create([
            'nombre' => 'Carta_nueva2',
            'precio'=> rand(5,50),
            'tipo' => 'normal',
            'rareza' => 'a',
            'habilidad' => null,
            'stock' => 7
        ]);

        $pedido = Pedido::create([
            'user_id' => $user->id,
        ]);

        //detalles
        DetallePedido::create([
            'pedido_id' => $pedido->id,
            'carta_id' => $carta1->id,
            'cantidad' => 3,
            'precioUnitario' => $carta1->precio,
            'precioTotal' => $carta1->precio * 3
        ]);

        DetallePedido::create([
            'pedido_id' => $pedido->id,
            'carta_id' => $carta2->id,
            'cantidad' => 2,
            'precioUnitario' => $carta2->precio,
            'precioTotal' => $carta2->precio * 2
        ]);



    }
}
