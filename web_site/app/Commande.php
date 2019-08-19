<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function menuElements()
    {
        return $this->hasMany('App\CommandeElement', 'commandes_elements', 'commande_id', 'menu_element_id');
    }
}
