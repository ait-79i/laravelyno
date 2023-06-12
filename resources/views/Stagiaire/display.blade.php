@extends('Master.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-2"> Stagiaires</h3>
        </div>
        <div class="col-12">
            <div class="row d-flex justify-content-between">
                <div class="col-2">

                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Groupe
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($grps as $groupe)
                                <a class="dropdown-item" href="{{ route('stagiairesGroupe', $groupe->id) }}">
                                    {{ $groupe->intitule }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-4">
                    <button class="btn btn-secondary">
                        <a class="text-decoration-none text-warning" href="{{ route('addStg') }}"><i
                                class="uil uil-plus h5">add stagiaire</i></a>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <table class="table table-hover">
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>groupe</th>
                <th>img</th>
            </tr>
            @foreach ($stagiaires as $stg)
                <tr>
                    <td>{{ $stg->nom }}</td>
                    <td>{{ $stg->prenom }}</td>
                    <td>{{ $groupes[strval($stg->groupe_id)] }}</td>
                    <td><img src="storage/pics/{{ $stg->img }}" alt="" width="40px" height="40px">
                    </td>
                    <td>
                        <div class="btn-group gap-2">
                            <button class="btn btn-outline-info"><a href="{{ route('updateStg', ['id' => $stg->id]) }}"
                                    class="text-decoration-none text-dark"><i class="uil uil-pen"></i></a>
                            </button>
                            <button class="btn btn-outline-danger">
                                <a href="{{ route('deleteStg', ['id' => $stg->id]) }}"
                                    class="text-decoration-none text-dark"><i class="uil uil-trash-alt"></i></a>
                            </button>
                        </div>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection
