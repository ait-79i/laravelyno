@extends('Master.master')
@section('content')
    <div class="col-12 ">
        <div class="col-12 mb-5">
            <h3 class="text-center mb-2"> Notes</h3>
        </div>
        <div class="row">
            <div class="row d-flex justify-content-between">
                <div class="col-2">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Groupe
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($grps as $groupe)
                                <a class="dropdown-item" href="{{ route('stgs-notes', $groupe->id) }}">
                                    {{ $groupe->intitule }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <button class="btn btn-secondary">
                        <a class="text-decoration-none text-warning" href="{{ route('notesCreate') }}"><i
                                class="uil uil-plus h5">saisie notes</i></a>
                    </button>
                </div>
            </div>

            <div>
                <table class="table table-hover">
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Notes</th>
                    </tr>
                    @foreach ($stgs as $stg)
                        <tr>
                            <td>{{ $stg->nom }}</td>
                            <td>{{ $stg->prenom }}</td>
                            <td>
                                @foreach ($stg->notes as $note)
                                        @php
                                            $module = DB::table('modules')
                                                ->join('examens', 'modules.id', '=', 'examens.module_id')
                                                ->join('notes', 'examens.id', '=', 'notes.examen_id')
                                                ->where('examens.id', '=', $note->examen_id)
                                                ->select('modules.intitule')
                                                ->limit(1)
                                                ->get()[0]->intitule;
                                        @endphp
                                    <div>
                                        {{ $module . ':' . $note->note }}
                                    </div>
                                @endforeach

                            </td>

                        </tr>
                    @endforeach

                </table>
            </div>
        </div>



    </div>
@endsection
