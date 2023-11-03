<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'tbl_Producto'; // nome da sua tabela
    protected $fillable = [
        'codigo', 'categoria_id', 'nombre', 'descripción', 'precio', 'estado', 'created_at', 'updated_at'
    ];
}
