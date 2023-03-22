@extends('Master.master')
@section('content')
<div class="col-12">
  <div class="btn col-10 btn-secondary mb-3">Groupe : {{ $groupe }}</div>
<table class="table table-hover">
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>date De Naissance</th>
                <th>gender</th>
                <th>adresse</th>
            </tr>
            @foreach ($stgs as $stg)
                <tr>
                    <td>{{ $stg->nom }}</td>
                    <td>{{ $stg->prenom }}</td>
                    <td>{{ $stg->dateNaissance }}</td>
                    <td>{{ $stg->genre }}</td>
                    <td>{{ $stg->addresse }}</td>
                </tr>
            @endforeach
        </table>


</div>
@endsection
