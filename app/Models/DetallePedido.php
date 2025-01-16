<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $guarded = [];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function carta()
    {
        return $this->belongsTo(Carta::class);
    }
}
