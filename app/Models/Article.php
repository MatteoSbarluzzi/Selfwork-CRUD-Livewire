<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image', // ✅ Assicurati che "image" sia presente qui
    ];
}
