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

    }

    public function cancelCommand(Request $data)
    {

    }
}
