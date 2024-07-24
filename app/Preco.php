<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    // Nome da tabela (opcional se seguir a convenção)
    protected $table = 'precos';

    // Chave primária (opcional se for 'id')
    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'impressao',
        'tem_acabamento',
        'tipo_acabamento',
        'preco',
        'material_id',
        'medida_id',
        'quantidade_id'
    ];
    

    
}
