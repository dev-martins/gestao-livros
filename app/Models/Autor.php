<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['Nome'];

    protected $table = 'autores';

    protected $primaryKey = 'CodAu';


    // public function livros()
    // {
    //     return $this->belongsToMany(Livro::class, 'livro_autores', 'AutorCodAu', 'LivroCodL','LivroCodL');
    // }
}
