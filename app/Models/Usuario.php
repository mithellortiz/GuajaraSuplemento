<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona; //importando la clase Persona

class Usuario extends Model
{
    use HasFactory;
    protected $table = "tbl_Usuario";
    protected $fillable = ['id','persona_id','nombre', 'apellido', 'email', 'password', 'estado', 'created_at', 'updated_at'];

    public function persona(){
        //Asume que tienes una columna persona_id en tbl_Usuario
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    public function getNombreFromPersona(){
        return $this->persona ? $this->persona->nombre : null;
    }
    public function getApellidoFromPersona()
{
        return $this->pesona ? $this->persona->apellido : null;
}
}
