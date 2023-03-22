@extends('Master.master')


@section('content')
    <div class="col-10 mt-3">
        <h3 class="text-center mb-3">Update Stagaire Infos</h3>
        <form action="" method="post">
            @csrf
            <div class="row">

                <div class="col">
                    First name :
                    <input type="text" class="form-control" placeholder="First name" name='nom'
                        value="{{ $stagiaire->nom }}">
                    <small style="color: red">
                        @error('nom')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col">
                    Last name :
                    <input type="text" class="form-control" placeholder="Last name" name="prenom"
                        value="{{ $stagiaire->prenom }}">
                    <small style="color: red">
                        @error('prenom')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="form-group col-md-4">
                    Date de Naissance :
                    <input type="date" class="form-control" name="date" value="{{ $stagiaire->dateNaissance }}">
                    <small style="color: red">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="form-group col-md-4">
                    Phone :
                    <input type="phone" class="form-control" name="phone" value="{{ $stagiaire->tel }}">
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
                            <option value="{{ $groupe->id }}" @if ($stagiaire->groupe_id === $groupe->id) selected @endif>
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
                        name="addresse" value="{{ $stagiaire->addresse }}">
                    <small style="color: red">
                        @error('addresse')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" value="male"
                                @if ($stagiaire->genre === 'male') checked @endif>
                            Male
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" value="female"
                                @if ($stagiaire->genre === 'female') checked @endif>
                            >
                            Female
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-outline-primary">Save</button>
        </form>
    </div>
@endsection
