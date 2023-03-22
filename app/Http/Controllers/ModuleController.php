<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Tags;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

  public function index()
  {
    $modules = Module::with('tags')->get();
    return view('Module.modules', compact('modules'));
  }

  public function create()
  {
    $tags = Tags::all();
    return view('Module.add', ['listTags' => $tags]);
  }

  public function store(Request $request)
  {

    $m = new Module();
    $m->intitule = $request->intitule;
    $m->prof = $request->prof;
    $m->coefficient = (int) $request->coef;
    $m->nbr_heure = (int) $request->nbr_heure;
    $m->regional = $request->regional === 'yes' ? 1 : 0;
    $m->save();
    $m->tags()->attach($request->tags);
    // return $m;
    return redirect()->route('modules.index')->with('message', 'module added successfully');
  }


  public function show(Module $module)
  {
  }


  public function edit(Module $module)
  {
    $listTags = Tags::all();
    return view('Module.edit', compact('module', 'listTags'));
  }


  public function update(Request $request, Module $module)
  {


    $module->intitule = $request->intitule;
    $module->save();
    return redirect()->route('modules.index');
  }

  public function destroy(Module $module)
  {
    $module->delete();
    return redirect()->back();
  }
}
