<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "tbl_cliente";
    protected $fillable = ['id','nit', 'tipocliente', 'nombre','apellido','direccion','created_at', 'updated_at'];

}
