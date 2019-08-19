<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaissierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function caissier()
    {
        return view('auth.caissier');
    }

    public function validatePayment(Request $data)
    {
        $commande = Commande::find($data->id);
        $commande->payment = true;
        $commande->save();

        if ($commande->type !== 'distance') {
            $table = Table::find($commande->tabl_id);
            $table->disponible = true;
        }

        return redirect()->back();
    }
}
