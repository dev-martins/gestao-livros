<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['Titulo', 'Editora', 'Edicao', 'AnoPublicacao'];

    protected $primaryKey = 'CodL';

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_autores', 'LivroCodL', 'AutorCodAu','CodL');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assuntos', 'LivroCodL', 'AssuntoCodAs','CodL');
    }
}
