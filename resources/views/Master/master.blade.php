<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  unicons   -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!--  icon  hhhhhh-->
    <link rel="icon" href="" type="image/x-icon">
    {{-- hhhh --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>8-79i</title>

</head>

<body>
    @section('header')
        <header class="container pt-1 shadow">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h3>
                        <a class="text-decoration-none text-black-50" href="/stagiaires">8-79i</a>
                    </h3>

                    <div class="d-flex">
                        <div class="h5 ">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="">
                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="uil uil-user-md h3"></i>
                            </x-dropdown-link>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <i class="uil uil-signout h3"></i>
                                </x-dropdown-link>
                            </form>
                        </div>


                    </div>
                </div>
                <div class="px-5">

                </div>
            </div>
        </header>
    @show


    <div class="container p-5 row ">
        <div class="col-2">
            @if (Auth::user()->role)
                <ul class="list-unstyled ps-2">
                    <li class="col">
                        <a href="{{ route('stagiaires') }}" class="text-decoration-none text-dark">Stagaires</a>
                    </li>

                    <li class="col">
                        <a href="{{ route('modules.index') }}" class="text-decoration-none text-dark">Modules</a>
                    </li>
                    
                    <li class="col">
                        <a href="{{ route('examen.index') }}"class="text-decoration-none text-dark">Exames</a>
                    </li>

                    <li class="col">
                        <a href="{{ route('stgs-notes') }}"class="text-decoration-none text-dark">Notes</a>
                    </li>
                    
                    <li class="col">
                        <a href="{{ route('archieve') }}"class="text-decoration-none text-dark">deleted stagiaires</a>
                    </li>

                </ul>
            @else
                <ul class="list-unstyled">
                    <li class="col">
                        <a href="{{ url('/groupe') }}" class="text-decoration-none text-dark">My Groupe</a>
                    </li>
                    <li class="col">
                        <a href="{{ route('stg-notes') }}" class="text-decoration-none text-dark">My Notes</a>
                    </li>
                    <li class="col">
                        <a href="" class="text-decoration-none text-dark">My Exams</a>
                    </li>
                </ul>
            @endif
        </div>
        <div class="col-10">
            <div class="container-fluid">

                @yield('content')
            </div>

        </div>

    </div>


    @section('footer')
        <footer class="fixed-bottom bg-body">
            <div class="text-center">
                &copy; 2023 Copyright :<span class="text-success"> All copyrights resorved</span>
                <div>Lorem ipsum dolor sit amet.</div>

            </div>
        </footer>
    @show



</body>

</html>
