<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pedido_id')->constrained()->onDelete('cascade');
            $table->foreignId('carta_id')->constrained()->onDelete('cascade');
            $table->integer('cantidad');
            $table->double('precioUnitario');
            $table->double('precioTotal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
