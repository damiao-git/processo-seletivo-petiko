<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = ["nome", "tipo_pessoa_id", "user_id", ];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
    public function tipo_pessoa()
    {
        return $this->belongsTo(TipoPessoa::class);
    }

    public function user_id(){
        return $this->hasOne(User::class);
    }
}
