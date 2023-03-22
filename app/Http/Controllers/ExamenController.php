<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Groupe;
use App\Models\Module;
use App\Models\Note;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $exams = Examen::all();
    $modules = Module::all()->pluck('intitule', 'id');
    $groupes = Groupe::all()->pluck('intitule', 'id');

    return view('examen.index', compact('exams', 'modules', 'groupes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $modules = Module::all();
    $groupes = Groupe::all();
    return view('examen.create', compact('modules', 'groupes'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $r)
  {
    $exam = new Examen();
    $exam->date_ex = $r->input('date_ex');
    $exam->salle = $r->input('salle');
    $exam->module_id = $r->module;
    $exam->groupe_id = $r->groupe;
    $exam->save();

    return redirect()->route('examen.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Examen  $examen
   * @return \Illuminate\Http\Response
   */
  public function show(Examen $examen)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Examen  $examen
   * @return \Illuminate\Http\Response
   */
  public function edit(Examen $examen)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Examen  $examen
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Examen $examen)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Examen  $examen
   * @return \Illuminate\Http\Response
   */
  public function destroy(Examen $examen)
  {
    //
  }

  public function notesCreate($id = 3)
  {
    $grps = Groupe::all();
    $stgs = Stagiaire::where('groupe_id', $id)->get();
    $examen = Examen::with('module')->get();
    return view('Notes.create', compact('grps', 'stgs', 'examen'));
  }
  public function notesStore(Request $r)
  {
    $data = $r->note;
    foreach ($data as $key => $value) {
      $n = new Note();
      $n->examen_id = $r->exam;
      $n->stagiaire_id = $key;
      $n->note = $value;
      $n->save();
    }
    return redirect('notes');
  }
}
