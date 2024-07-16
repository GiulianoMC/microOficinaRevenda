<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'materiais';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['nome'];

    public function acabamentos()
    {
        return $this->belongsToMany(Acabamento::class, 'material_acabamento');
    }

    public function medidas()
    {
        return $this->belongsToMany(Medida::class);
    }

    public function quantidades()
    {
        return $this->belongsToMany(Quantidade::class);
    }

}


