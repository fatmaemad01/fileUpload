<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    @stack('styles')
    <title>{{ $title }}</title>
</head>

<body style=" background-color: #bde4f3;">
    <div class="fixed-top" style="background-color: #bde4f3">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class=" p-4 d-flex justify-content-center " style="background-color: #2d4170">
                @if (Auth::user())
                    <a href="{{ route('files.index', Auth::id()) }}" class="text-white  nav-link">Dashboard</a>
                @endif
                <a href="{{ route('file.create') }}" class="text-white nav-link">Upload</a>
                <a href="#" class="text-white  nav-link">Company</a>
                <a href="{{route('plans')}}" class="text-white  nav-link">Plans</a>
                @if (Auth::user())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn"><a style="color: #fff"
                                class="secondary  nav-link">Logout</a></button>
                    </form>
                @else
                    <button class="btn"> <a href="{{ route('login') }}" class="secondary nav-link">Login</a></button>
                @endif
            </div>
        </div>
        <nav class="navbar navbar-dark  d-flex justify-content-between" style="background-color: #2d4170">
            <img src="{{ asset('images/logo.png') }}" alt="">

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
    <div class=" mt-4 ">
        {{ $slot }}
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    @stack('scripts')
</body>

</html>
