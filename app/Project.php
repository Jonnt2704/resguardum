<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";
    
    protected $fillable = [
        'title',
        'autor',
        'topic',
        'line',
        'tutor',
        'resume',
        'note',
        'path',
        'create_date'
    ];
}
