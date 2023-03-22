@extends('Master.master')
@section('content')
    <div class="col-10">

        <form action="{{ route('modules.update', $module) }}" method="POST">
            @csrf
            @method('PUT')

            Module Name : <input type="text" class="form-control" value="{{ $module->intitule }}" name="intitule">
            <br><br>
            <label for="">Tags</label>
            <select multiple name="tags[]" id="" class="form-control">
                @foreach ($listTags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->titre }}</option>
                @endforeach
            </select>
            <br />
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </form>
    </div>
@stop
