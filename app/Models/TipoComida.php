<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoComida extends Model
{
    protected $table = 'tb_tipo_comidas';
    protected $primaryKey = 'id_tipo_comida';

    protected $fillable = ['nombre_categoria'];

    public function comidas()
    {
        
        return $this->hasMany(Comida::class, 'id_tipo_comida');
}
}
