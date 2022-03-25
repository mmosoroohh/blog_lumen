<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'url', 'name', 'gender', 'culture', 'born', 'died', 'titles', 'aliases', 'father', 'mother',
        'spouse', 'allegiances', 'books', 'povBooks', 'tvSeries', 'playedBy'
    ];
}
