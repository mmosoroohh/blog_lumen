<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'book_id', 'comment', 'ip_address', 'date'
    ];
}
