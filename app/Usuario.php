<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Nivel;
use App\Setor;

class Usuario extends Authenticatable
{
    use Notifiable;

    public $timestamps   = false;
    public $incrementing = false;

    protected $table      = 'usuarios';
    protected $keyType    = 'string';
    protected $primaryKey = 'usr_codigo';

    //Dados que podem ser passados
    protected $fillable = ['usr_codigo', 'usr_nome', 'usr_funcao', 'usr_senha',
    'und_codigo', 'set_codigo', 'niv_codigo', 'usr_bloqueado', 'usr_telefone', 'usr_email'];

    //Campos protegidos
    protected $hidden = ['usr_senha', 'remember_token'];

    //Mudança de tipos
    protected $casts = [
        'usr_bloqueado' => 'boolean'
    ];

    //Relacionamento entre Usuario e Nivel
    public function usr_nivel(){
        /*Tabela, foreignKey, localKey*/
        return $this->hasOne(Nivel::class, 'niv_codigo', 'niv_codigo');
    }

    //Relacionamento entre Setores e Usuarios
    public function usr_setores(){
        /*Tabela, foreignKey, localKey*/
        return $this->hasOne(Setores::class, ['set_codigo','und_codigo'], ['set_codigo','und_codigo']);
    }
}
