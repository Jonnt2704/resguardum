<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Line extends Model
{

    protected $table = "line";
    
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
