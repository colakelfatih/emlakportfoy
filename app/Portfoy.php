<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfoy extends Model
{
    protected $fillable = [
        'street','block','plot','price', 'centare', 'name', 'notes'
    ];
}
