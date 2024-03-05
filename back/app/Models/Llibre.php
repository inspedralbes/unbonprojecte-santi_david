<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llibre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titol',
        'autor',
        'any',
        'editorial',
        'pagines',
        'isbn',
        'imatge',
        'sinopsis'
    ];
}
