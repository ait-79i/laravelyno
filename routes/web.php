<?php

use App\Http\Controllers\ExamenController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::middleware('auth','admin')->group(function () {

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  //   <------------ Stagiaire ----------->

  Route::get('/stagiaires', [StagiaireController::class, 'getStagaires'])->middleware(['auth', 'verified'])->name('stagiaires');

  Route::match(['get', 'post'], '/addStagiaire', [StagiaireController::class, 'addStagaire'])->name('addStg');


  Route::get('/dropstagiaire/{id}', [StagiaireController::class, 'dropStagiaire'])->name('deleteStg');

  Route::match(['get', 'post'], '/UpdateStg/{id}', [StagiaireController::class, 'updateStagiaire'])->name('updateStg');




  Route::get('/archieve', [StagiaireController::class, 'getDeltedStagiaires'])->name('archieve');

  Route::post('/stagiaires/{id}/restore', [StagiaireController::class, 'restore'])->name('stg.restore');


  Route::post('/stagiaires/{id}/force_delete', [StagiaireController::class, 'forceDelete'])->name('stg.force_delete');
  // <------------- Modules ----------->


  Route::resource('modules', ModuleController::class);



  Route::resource('tags', TagsController::class);
  Route::resource('examen', ExamenController::class);


  Route::get('/stagiaires/{id}', [StagiaireController::class, 'getStagiairesGroupe'])->name('stagiairesGroupe');

  // <------------- Notes ----------->
  Route::get('/notes/{id?}', [StagiaireController::class, 'getNotes'])->name('stgs-notes');

  Route::get('/setnotes/{id?}', [ExamenController::class, 'notesCreate'])->name('notesCreate');

  Route::post('/notesSave', [ExamenController::class, 'notesStore'])->name('notes.store');


  //  <-------- end admin routes ------------>

});

require __DIR__ . '/auth.php';



//  <-------- Stagiaire routes ------------>


// Route::prefix('')->group(function () {
  Route::get('groupe', [StagiaireController::class, 'userGroupe'])->name('stg_groupe');
  Route::get('stg-notes', [StagiaireController::class, 'userNotes'])->name('stg-notes');

// });
// //  <-------- end Stagiaire routes ------------>

