<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;


class Producto extends Model
{
    use HasFactory;
    protected $table = 'tbl_Producto'; // nome da sua tabela
    protected $fillable = [
        'id','codigo', 'categoria_id', 'categoria_nombre', 'nombre', 'descripción', 'precio', 'estado', 'created_at', 'updated_at'
    ];
    public function categoria(){
        $this->hasOne('App\Models\Categoria', 'id','categoria_id');
    }
}
