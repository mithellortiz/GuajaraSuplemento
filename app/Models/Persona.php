<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = "tbl_persona";
    protected $fillable = ['id','nombre', 'apellido', 'celular', 'direccion', 'estado', 'created_at', 'updated_at'];

}
