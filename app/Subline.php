<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subline extends Model
{

    protected $table = "subline";
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'line'
    ];

}
