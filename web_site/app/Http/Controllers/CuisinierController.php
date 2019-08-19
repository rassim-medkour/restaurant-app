<?php

namespace App\Http\Controllers;

use App\Commande;
use App\MenuElement;
use Illuminate\Http\Request;

class CuisinierController extends Controller
{
    public function validateCommand(Request $data)
    {
        
    }

    public function showCommands()
    {
        $commandes = Commande::all();

        return view('auth.cuisinier', compact($commandes));
    }

    public function disponible(Request $data)
    {
        $element = MenuElement::find($data->id);
        $element->disponible = $data->disponible;

        return redirect()->back();
    }
}
