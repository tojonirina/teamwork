<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Team work</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('stylesheet')
</head>
<body>

    <nav class="navbar navbar-expand-md bg-dark-blue navbar-dark">
        <a class="navbar-brand text-dark-blue" href="{{ route('home') }}"><i class="ti-medall-alt"></i> TeamWork</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item ml-3">
                    <a class="nav-link active text-light-blue bold" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link active text-light-blue bold" href="/">Forum</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link active text-light-blue bold" href="/">Contact us</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('body')
    
    @section('footer')
        <footer class="container-fluid p-4 bg-dark text-white">&copy;{{ date('Y') }}</footer>
    @show

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')


</body>
</html>