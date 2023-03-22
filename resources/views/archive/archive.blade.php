@extends('Master.master')
@section('content')
    <div class="col-12">
        <div class="btn col-10 btn-secondary mb-3">deleted stagiaires</div>
        <table class="table table-hover">
            <tr>
                <th>nom</th>
                <th>prenom</th>
            </tr>
            @foreach ($stgs as $stg)
                <tr>
                    <td>{{ $stg->nom }}</td>
                    <td>{{ $stg->prenom }}</td>

                    <td>
                        <form action="{{ route('stg.restore', $stg->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 bg-gray-800 border"
                                onclick="return confirm('are you sure ?')">
                                Restore
                            </button>
                        </form>
                        <form action="{{ route('stg.force_delete', $stg->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 bg-gray-800 border"
                                onclick="return confirm('are you sure ?')">
                                Force
                            </button>
                        </form>



                    </td>

                </tr>
            @endforeach
        </table>


    </div>
@endsection
