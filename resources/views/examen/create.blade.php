@extends('Master.master')
@section('content')

    <div class="col-12">

        <div class="col-12 mb-5">
            <h3 class="text-center mb-2"> Programmer examen</h3>
        </div>

        <form method="POST" action="{{ route('examen.store') }}">
            @csrf
            Date : <input type="date" class="form-control" name="date_ex">
            <br />
            Salle: <input type="text" class="form-control" name="salle">
            <br />
            <label for="">Module </label>
            <select name="module" id="" class="form-control">
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->intitule }}</option>
                @endforeach
            </select>
            <br />
            <label for="">Groupe</label>
            <select name="groupe" id="" class="form-control">
                @foreach ($groupes as $groupe)
                    <option value="{{ $groupe->id }}">{{ $groupe->intitule }}</option>
                @endforeach
            </select>
            <br />
            <button type="submit" class="btn btn-outline-primary">Definir l'exam</button>
        </form>

    </div>
@stop
