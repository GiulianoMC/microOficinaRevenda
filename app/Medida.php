<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'medidas';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['medida'];

    public function material()
    {
        return $this->belongsToMany(Material::class);
    }

}
