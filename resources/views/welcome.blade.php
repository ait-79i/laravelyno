<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Formation</title>
    <style>
        .header {
            background-color: #eee
        }
    </style>
</head>

<body class="antialiased">
    <header class="header">

        <div class="container  d-flex ps-2 justify-content-between align-items-center">
            <h2 class="h2">
                8-79i
            </h2>

            <div class="pe-3">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/stagiaires') }}" class="text-decoration-none text-black-50">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-decoration-none text-black me-2">Sign In</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-decoration-none text-black">Sign Up</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>
    <div class="container mt-5">

        <div class="set-bg-img">
            <div class=" row">
                <div class="col-6 bg-gradient">
                    <div>
                        <h1 class="ms-5 mb-3"> 8-79i School</h1>

                        <div class="mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit commodi sed distinctio
                            blanditiis sint ipsa ex explicabo laboriosam cupiditate! Quod asperiores laboriosam
                            recusandae odio repellendus doloremque sit tempore magni! Nostrum.
                        </div>

                        <div class=" ms-5 text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab ipsam unde debitis voluptates
                            iure, vero
                            quisquam nisi eveniet accusamus tempore dolore saepe odio quibusdam eos eligendi! Quod
                            dolores
                            repellendus
                            iste.
                            Veniam repellat ipsam voluptas aliquid provident, quaerat accusamus laudantium maiores vel,
                            ea
                            consequuntur
                            ab hic voluptatum facilis laborum quae at molestias odit reiciendis necessitatibus nam
                            blanditiis

                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button class="btn btn-warning col-4 ">
                            @auth
                                @if (Auth::user()->role === 1)
                                    <a href="{{ url('/stagiaires') }}" class="text-decoration-none text-black-50">Get
                                        Started</a>
                                @else
                                    <a href="{{ url('/groupe') }}" class="text-decoration-none text-black-50">Get
                                        Started</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="text-decoration-none text-black me-2">Get Started</a>
                            @endauth
                        </button>
                    </div>
                </div>
                <div class="col-6  set-bg-img">
                    <img src="syba.jpeg" class="rounded float-left h4" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
