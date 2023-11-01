<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    
    // Indicar a tabela correspondente no banco de dados
    protected $table = 'tbl_tipos_usuarios';

    // Colunas que são preenchíveis no banco de dados
    protected $fillable = ['descricao'];

    // Desabilitar timestamps (se não estiver usando created_at e updated_at na sua tabela)
    public $timestamps = false;

    // Você pode manter os métodos para obter e definir as propriedades,
    // mas em um Model típico do Laravel, você geralmente não define
    // propriedades privadas para colunas do banco de dados, pois
    // o próprio Eloquent se encarrega disso.
    
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
