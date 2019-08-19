<?php

namespace App\Http\Controllers;

use App\MenuElement;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    protected function edit(Request $data)
    {
        $element = MenuElement::find($data->id);
        $element->type = $data->type;
        $element->quantite = $data->quantite;
        $element->titre = $data->titre;
        $element->prix = $data->prix;

        $element->save();

        return redirect()->back();
    }

    protected function create(Request $data)
    {
        $element = MenuElement::create([
            'type' => $data['type'],
            'quantite' => $data['quantite'],
            'titre' => $data['titre'],
            'prix' => $data['prix'],

        ]);

        return redirect()->back();
    }

    protected function delete(Request $data)
    {
        $element = MenuElement::find($data->id);
        $element->delete();
    }

    protected function getAll()
    {
        $elements = MenuElement::all();

        return view('manager.menu_elements',compact($elements));
    }
}
