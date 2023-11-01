<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    protected $table = 'tbl_tipo_usuario';
    protected $fillable = ['nombre_tipo', 'created_at', 'updated_at'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'tipo_usuario_id');
    }

}
