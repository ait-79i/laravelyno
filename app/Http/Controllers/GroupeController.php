<?php

namespace App\Http\Controllers;

use App\Models\Groupe;

class GroupeController extends Controller
{
    function getGroupes()
    {
        $groupes = Groupe::all();

        return view('groupe.groupes', compact('groupes'));

    }
}
