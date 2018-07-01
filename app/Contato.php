<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'city', 'state', 'period'
    ];
}
