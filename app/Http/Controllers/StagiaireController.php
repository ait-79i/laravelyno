<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Module;
use App\Models\Stagiaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StagiaireController extends Controller
{
  function addStagaire(Request $r)
  {
    if ($r->isMethod('get')) {

      $allGroupes = Groupe::all();

      return view('Stagiaire.add', compact('allGroupes'));
    } else {

      $validate = $r->validate([
        'nom' => 'bail|required|between:4,10|alpha',
        'prenom' => 'bail|required|between:4,10|alpha',
        'date' => 'required|date',
        'genre' => 'required',
        'phone' => 'bail|required|numeric|regex:/^[01][5-7][0-9]{8}$/ ', //!/^(+212|0)[567][0-9]{8}$/
        'addresse' => 'bail|required|string',
        'groupe' => 'bail|required',
        // 'img'=> 'mime:jpg,png,jpeg'
      ]);

      $file_name = time() . '.' . $r->img->getClientOriginalExtension();
      $r->file('img')->storeAs('pics', $file_name, 'public');


      User::create([
        'name' => $r->input('nom'),
        'email' => $r->input('nom') . '@gmail.com',
        'password' => Hash::make($r->input('nom')),
      ]);

      $stg = new Stagiaire();
      $stg->nom = $r->input('nom');
      $stg->prenom = $r->input('prenom');
      $stg->dateNaissance = $r->input('date');
      $stg->genre = $r->input('genre');
      $stg->tel = $r->input('phone');
      $stg->addresse = $r->input('addresse');
      $stg->groupe_id = $r->input('groupe');
      $stg->user_id = DB::table('users')->max('id');
      $stg->img = $file_name;
      $stg->save();

      return redirect('stagiaires');
      // return DB::table('users')->max('id');
    }
  }

  public function getStagaires()
  {
    $stagiaires = Stagiaire::all();


    $groupes = Groupe::all()->pluck('intitule', 'id');

    $grps = Groupe::all();



    return view('Stagiaire.display', ['stagiaires' => $stagiaires, 'groupes' => $groupes, 'grps' => $grps]);
  }

  public function dropStagiaire($id)
  {
    Stagiaire::find($id)->delete();
    return redirect("stagiaires");
  }

  public function updateStagiaire($id, Request $r)
  {
    $stagiaire = Stagiaire::find($id);

    if ($r->isMethod('get')) {
      $allGroupes = Groupe::all();
      return view('Stagiaire.Update', ['stagiaire' => $stagiaire, 'allGroupes' => $allGroupes]);
    } else {
      $r->validate([
        'nom' => 'bail|required|between:4,10|alpha',
        'prenom' => 'bail|required|between:4,10|alpha',
        'date' => 'required|date',
        'genre' => 'required',
        'phone' => 'bail|required|numeric|regex:/^0[5-7][0-9]{8}$/ ',
        'addresse' => 'bail|required|string',
        'groupe' => 'bail|required'
      ]);

      $stagiaire->nom = $r->input('nom');
      $stagiaire->prenom = $r->input('prenom');
      $stagiaire->dateNaissance = $r->input('date');
      $stagiaire->genre = $r->input('genre');
      $stagiaire->tel = $r->input('phone');
      $stagiaire->addresse = $r->input('addresse');
      $stagiaire->groupe_id = $r->input('groupe');
      $stagiaire->user_id = $stagiaire->user_id;
      $stagiaire->save();
      return redirect('stagiaires');
    }
  }


  // <----------  soft delete ------------>

  public function restore($id)
  {

    $stagiaire = Stagiaire::onlyTrashed()->findOrFail($id);
    $stagiaire->restore();


    return redirect()->route('stagiaires');
  }


  public function forceDelete($id)
  {

    $stagiaire = Stagiaire::onlyTrashed()->findOrFail($id);
    $stagiaire->forceDelete();


    return redirect()->route('stagiaires');
  }


  public function getDeltedStagiaires(Request $r)
  {
    $stgs = Stagiaire::onlyTrashed()->get();
    // return $stgs;
    return view('archive.archive',compact('stgs'));
  }
  // <----------  end soft delete ------------>



  public function getStagiairesGroupe($id)
  {
    $groupes = Groupe::all()->pluck('intitule', 'id');

    $grps = Groupe::all();

    // $stg = Stagiaire::find($id)->with('notes');
    $stgs = DB::table('stagiaires')->where('groupe_id', $id)->get();

    return view('Stagiaire.display', ['stagiaires' => $stgs, 'groupes' => $groupes, 'grps' => $grps]);
  }


  public function getNotes($id = 1)
  {
    $grps = Groupe::all();
    $stgs = Stagiaire::with('notes')->where('stagiaires.groupe_id', '=', $id)->get();

    // $stgs = DB::table('notes')
    //   ->join('stagiaires', 'notes.stagiaire_id', '=', 'stagiaires.id')
    //   ->join('groupes', 'stagiaires.id', '=', 'groupes.id')
    //   ->select('stagiaires.nom', 'stagiaires.prenom', 'notes.note')
    //   ->where('groupes.id', '=', $id)
    //   ->get();



    return view('Notes.Notes', compact('stgs', 'grps'));
    // return getmodule(1);
  }


  public function userGroupe()
  {

    $id = Auth::user()->id;
    $groupe_id = Stagiaire::where('user_id', '=', $id)->select('groupe_id')
      ->get()[0]->groupe_id;
    $stgs = Stagiaire::where('groupe_id', '=', $groupe_id)->get();

    $groupe = Groupe::where('id', '=', $groupe_id)->select('intitule')->get()[0]->intitule;

    return view('user.index', compact('stgs', 'groupe'));
  }
  public function userNotes()
  {

    $id = Auth::user()->id;

    $Stagiaite_id = Stagiaire::where('user_id', '=', $id)->select('id')->get()[0]->id;

    $notes = DB::table('notes')
      ->join('examens', 'notes.examen_id', '=', 'examens.id')
      ->join('modules', 'modules.id', '=', 'examens.module_id')
      ->where('notes.stagiaire_id', '=', $Stagiaite_id)->get();

    // return $notes;
    return view('user.notes', compact('notes'));
  }
}
