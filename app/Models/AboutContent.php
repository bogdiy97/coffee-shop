<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $table = 'about_content';
    protected $fillable = ['content', 'photos'];
    protected $casts = [
        'photos' => 'array'
    ];
}
