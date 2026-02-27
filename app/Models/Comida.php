<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $table = 'tb_comidas';
    protected $primaryKey = 'id_comida';

    protected $fillable = [
        'nombre_comida',
        'costo',
        'detalle_comida',
        'id_tipo_comida'
    ];

    public function tipoComida()
    {
        return $this->belongsTo(TipoComida::class, 'id_tipo_comida');
    }
}
