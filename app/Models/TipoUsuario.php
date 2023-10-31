<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Usuario; //importando la clase Usuario
class tipoUsuario extends model
{
    private $id;
    private $descricao;

    // Construtor da classe
    public function __construct($id, $descricao) {
        $this->id = $id;
        $this->descricao = $descricao;
    }

    // Método para obter o ID
    public function getId() {
        return $this->id;
    }

    // Método para obter a descrição
    public function getDescricao() {
        return $this->descricao;
    }

    // Método para definir o ID
    public function setId($id) {
        $this->id = $id;
    }

    // Método para definir a descrição
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
