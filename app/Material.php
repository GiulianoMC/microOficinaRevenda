<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'material';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['nome'];

    public function acabamento()
    {
        return $this->belongsToMany(Acabamento::class);
    }

    public function medida()
    {
        return $this->belongsToMany(Medida::class);
    }

    public function quantidade()
    {
        return $this->belongsToMany(Quantidade::class);
    }

}


