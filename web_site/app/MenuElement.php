<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuElement extends Model
{

    protected $fillable = [
        'type', 'quantite', 'titre', 'prix',
    ];
}
