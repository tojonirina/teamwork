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

    {{-- BO NAVBAR --}}
    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">

        <a class="navbar-brand" href="{{ route('accounts.index', ['account' => session('user_hashed_id')]) }}"><i class="ti-medall-alt"></i> TeamWork</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    
            <ul class="navbar-nav">
                <li class="nav-item ml-3">
                    <a class="nav-link active" href="{{ route('accounts.projects.index', ['account' => session('user_hashed_id')]) }}"><i class="ti-dashboard"></i> &nbsp; Projects</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link active" href="{{ route('accounts.posts.index', ['account' => session('user_hashed_id')]) }}"><i class="ti-layout-list-post"></i> &nbsp; Forum</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link active" href="{{ route('accounts.settings', ['account' => session('user_hashed_id')]) }}"><i class="ti-panel"></i> &nbsp; Settings</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link active" href="#"><i class="ti-user"></i> &nbsp; {{ session('user_fullname') }}</a>
                </li>
            </ul>

            <form action="{{ route('logout') }}" method="POST" class="form">
                @csrf
                <button class="btn btn-dark w-100"><i class="ti-power-off"></i> &nbsp; Logout</button>
            </form>
            
        </div>

    </nav>

    @yield('body')

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')

</body>
</html>