@extends('Master.master')
@section('content')


<div class="col-10">

 <form method="POST" action="{{ route('modules.store') }}">
  @csrf
  Module Name : <input type="text" class="form-control" name="intitule">
  <br><br>
  Module Prof : <input type="text" class="form-control" name="prof">
  <br><br>
  Module Coefficient : <input type="text" class="form-control" name="coef">
  <br><br>
  Module Nombre d'heure : <input type="text" class="form-control" name="nbr_heure">
  <br><br>
  <label for="">Regional</label>
  <select name="regional" id="" class="form-control">
   <option value="yes">Yes</option>
   <option value="no">NO</option>
  </select>
  <br />
  <label for="">Module Tags</label>
  <select multiple name="tags[]" id="" class="form-control">
   @foreach ($listTags as $tag)
    <option value="{{ $tag->id }}">{{ $tag->titre }}</option>
   @endforeach
  </select>
  <br />
  <button type="submit" class="btn btn-outline-primary">Add module</button>
 </form>

</div>
@stop
