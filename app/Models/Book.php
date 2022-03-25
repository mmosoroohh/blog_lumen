<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'url', 'name', 'isbn', 'authors', 'numberOfPages', 'publisher', 'country', 'mediaType', 'released', 'characters', 'povCharacters'
    ];
}
