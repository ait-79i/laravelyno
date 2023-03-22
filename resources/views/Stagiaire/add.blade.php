@extends('Master.master')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

{{-- @if ($errors->any())
@foreach ($errors->all() as $err)
    <li>{{ $err }}</li>
@endforeach
@endif --}}

@section('content')
    <div class="container-fluid col-10">
        <h2 class="text-center mb-3">Add Stagaire</h2>
        <form action="" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="">

                <div class="col">
                    First name :
                    <input type="text" class="form-control" placeholder="First name" name='nom'
                        value="{{ old('nom') }}">
                    <small style="color: red">
                        @error('nom')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col">
                    Last name :
                    <input type="text" class="form-control" placeholder="Last name" name="prenom"
                        value="{{ old('prenom') }}">
                    <small style="color: red">
                        @error('prenom')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    Date de Naissance :
                    <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                    <small style="color: red">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="form-group col-md-4">
                    Phone :
                    <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                    <small style="color: red">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="form-group col-md-4">
                    Groupe :
                    <select class="form-control" name="groupe">
                        @foreach ($allGroupes as $groupe)
                            <option value="{{ $groupe->id }}" @if (old('groupe') === $groupe->intitule) selected @endif>
                                {{ $groupe->intitule }}</option>
                        @endforeach
                    </select>
                    <small style="color: red">
                        @error('groupe')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="form-group">
                    Address :
                    <input type="text" class="form-control" placeholder="1234 Sidi Youssef Ben Ali marrakech"
                        name="addresse" value="{{ old('addresse') }}">
                    <small style="color: red">
                        @error('addresse')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender :</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genre" value="male" checked>
                                Male
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genre" value="female">
                                Female
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>

            <label class="form-label" for="customFile">stagiaire image :</label>
            <input type="file" class="form-control" name="img" id="customFile" accept="image/jpg ,image/png ,image/jpeg" />

            <button type="submit" class="btn btn-outline-success mt-2">Add Stagaire</button>
        </form>
    </div>
@endsection
