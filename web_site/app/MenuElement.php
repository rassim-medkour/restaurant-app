<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuElement extends Model
{
    public function Commandes()
    {
        return $this->belongsToMany('App\CommandeElement', 'commandes_elements', 'menu_element_id', 'commande_id');
    }

    protected $fillable = [
        'type', 'quantite', 'titre', 'prix',
    ];
}
