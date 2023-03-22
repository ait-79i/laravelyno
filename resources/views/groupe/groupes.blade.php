@extends('Master.master')
@section('content')

<div class="col-10">
<table class="table table-condensed">
    <tr>
      <th>groupe</th>
        <th>Nombre De Stagiaire</th>
    </tr>
    @foreach ($groupes as $groupe)
    <tr>
      <td>{{ $groupe->intitule }}</td>
        <td>{{ DB::table('stagiaires')->where('groupe_id',$groupe->id )->count() }}</td>
      </tr>
    @endforeach
</table>
</div>
@stop
