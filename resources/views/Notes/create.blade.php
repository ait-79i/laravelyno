@extends('Master.master')
@section('content')
    <div class="col-12 ">

      <div class="col-12 mb-5">
            <h3 class="text-center mb-2">Notes <span class="h6">/saisie</span></h3>
        </div>

        <form method="post" action="{{ route('notes.store') }}">
            @csrf
            <div class="row">
                <div class="col-2">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Groupe
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($grps as $groupe)
                                <a class="dropdown-item" href="{{ route('notesCreate', $groupe->id) }}" >
                                    {{ $groupe->intitule }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <select class="form-control" name="exam">
                        @foreach ($examen as $exam)
                            <option value="{{ $exam->id }}">
                                {{ $exam->module->intitule }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="container-fluid">
                <table class="table table-hover">
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>Note</th>

                    </tr>

                    @foreach ($stgs as $stg)
                        <tr>
                            <td>{{ $stg->id }}</td>
                            <td>{{ $stg->nom }}</td>
                            <td>{{ $stg->prenom }}</td>
                            <td>
                                <input type="text" name="note[{{ $stg->id }}]" class="form-control">
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </form>

    </div>
@endsection
