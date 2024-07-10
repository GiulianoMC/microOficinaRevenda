<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acabamento extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'acabamentos';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = ['nome'];
    
    public function material()
    {
        return $this->belongsToMany(Material::class);
    }

}
