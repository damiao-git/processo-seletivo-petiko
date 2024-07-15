<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = ["nome"];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
    public function tipo_pessoa()
    {
        return $this->belongsTo(TipoPessoa::class);
    }
}
