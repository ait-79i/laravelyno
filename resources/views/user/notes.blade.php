@extends('Master.master')
@section('content')
    <div class="col-12">
        <div class="btn col-10 btn-secondary mb-3">List note avec modules info</div>
        <table class="table table-hover">
            <tr>
                <th>Module</th>
                <th>Formatteur</th>
                <th>Regional</th>
                <th>coefficient</th>
                <th>Note</th>
                <th>Date</th>
            </tr>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->intitule }}</td>
                    <td>{{ $note->prof }}</td>
                    <td>{{ $note->regional === 1 ? 'YES' : 'NO' }}</td>
                    <td>{{ $note->coefficient }}</td>
                    <td>{{ $note->note }}</td>
                    <td>{{ $note->date_ex }}</td>
                </tr>
            @endforeach
        </table>


    </div>
@endsection
