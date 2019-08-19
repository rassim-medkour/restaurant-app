<?php

namespace App\Http\Controllers;

use App\MenuElement;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showMenu()
    {
        $menu = MenuElement::all();

        return view('menu', compact($menu));
    }

    public function makeCommand(Request $data)
    {
        if ($data->type !== 'distance') {
            $commande = Commande::create([
                'payment' => false,
                'type' => 'sur place',
                'table_id' => $data->table_id,
            ]);
            $table = Table::find($data->table_id);
            $table->disponible = false;
            $table->save();

        } else {
            $commande = Commande::create([
                'payment' => false,
                'type' => 'distance',

            ]);
        }

    }

    public function cancelCommand(Request $data)
    {
        $commande = Commande::find($data->id);
        if ($commande->state === 'pending') {
            if ($commande->type !== 'distance') {
                $table = Table::find($commande->table_id);
                $table->disponible = true;
                $table->save();
            }
            $commande->delete();
            return redirect()->back()->with('message', 'IT WORKS!');
        } else {
            return redirect()->back()->with('message', 'IT DOESN\'T WORKS!');
        }
    }
}
