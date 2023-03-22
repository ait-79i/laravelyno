@extends('Master.master')
@section('content')
    <div class="col-10">
        <div class="col-4">
            <button class="btn btn-secondary">
                <a class="text-decoration-none text-warning" href="{{ route('modules.create') }}">Add module</i></a>
            </button>
        </div>
        <table class="table table-hover">
            <tr>
                <th>module</th>
                <th>Profisseur</th>
                <th>Coefficient</th>
                <th>Regional</th>
                <th>module tags</th>
                <th></th>
            </tr>
            @foreach ($modules as $module)
                <tr>
                    <td>{{ $module->intitule }}</td>
                    <td>{{ $module->prof }}</td>
                    <td>{{ $module->coefficient }}</td>
                    <td>{{ $module->regional === 1 ? 'Yes' : 'No' }}</td>
                    <td>
                        @foreach ($module->tags as $tag)
                            <p>{{ $tag->titre }}</p>
                        @endforeach

                    </td>
                    <td>
                        <div class="btn-group gap-2">

                            <button class="btn btn-outline-info">
                                <a href="{{ route('modules.edit', $module) }}" class="text-decoration-none text-dark">
                                    <i class="uil uil-pen"></i>
                                </a>
                            </button>
                            <form action="{{ route('modules.destroy', $module) }}" method="post"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="uil uil-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

@stop
