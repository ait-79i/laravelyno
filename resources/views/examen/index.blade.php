@extends('Master.master')
@section('content')

    <div class="col-12">
      <div class="col-12 mb-5">
            <h3 class="text-center mb-2"> Examens</h3>
        </div>

        <div class="col-4">

                {{-- <a class="text-decoration-none text-dark" href="{{ route('examen.create') }} }}"></i></a> --}}
                <button class="btn btn-secondary"> <a href="{{ route('examen.create') }}"class="text-warning text-decoration-none ">Programmer examen</a> </button>


        </div>

        <table class="table table-hover">
            <tr>
                <th>Module</th>
                <th>Date Exam</th>
                <th>salle</th>
                <th>Groupe</th>

            </tr>

            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $modules[strval($exam->module_id)] }}</td>
                    <td>{{ $exam->date_ex }}</td>
                    <td>{{ $exam->salle }}</td>
                    <td>{{  $groupes[strval($exam->groupe_id)] }}</td>
                    <td>
                        <div class="btn-group gap-2">
                            <button class="btn btn-outline-danger">
                                <a href="" class="text-decoration-none text-dark"><i
                                        class="uil uil-trash-alt"></i></a>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@stop
