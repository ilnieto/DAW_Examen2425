<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $guarded = [];

    public function detallesPedido()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
