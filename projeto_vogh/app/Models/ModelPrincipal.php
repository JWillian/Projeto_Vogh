<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPrincipal extends Model
{
   protected $table='tb_Pessoa';
   protected $fillable=['nome','id_user','idade'];
   // nome da tabela do bando de dados o mesmo da model !!


public function relUser()
{
   
return $this->hasOne('App\Models\User', 'id', 'id_user');


}

}