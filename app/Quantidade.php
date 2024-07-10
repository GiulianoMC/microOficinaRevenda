<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantidade extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'quantidades';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['quantidade'];

    public function material()
    {
        return $this->belongsToMany(Material::class);
    }

}
