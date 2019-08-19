<?php

namespace App\Http\Controllers;

use App\Commande;
use App\MenuElement;
use Illuminate\Http\Request;

class CuisinierController extends Controller
{
    public function validateCommand(Request $data)
    {
        $commande = Commande::find($data->id);
        $commande->state = 'ready to deliver';
        $commande->save();
        return redirect()->back()->with('message', 'validated succefully');
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
