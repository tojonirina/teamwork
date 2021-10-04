@extends('layouts/front-office')

@section('body')

{{-- HEADER --}}
<div class="container-fluid mt-5 mb-5">
    <div class="row m-0">
        <div class="col-md-8 col-lg-8 col-xl-8 p-5">
            <span class="display-4">How it works?</span>
            <br><br>
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores a voluptatum nisi iure tenetur laudantium, nulla velit dolorum ratione alias nostrum, ex dolores nobis beatae magni fugiat aliquid. Labore, hic!</h3>
            <br>
            <div class="container-fluid p-0">
                <a href="" class="btn btn-success mt-1 p-2 bold"><i class="ti-medall-alt"></i> Planning</a>
                <a href="" class="btn btn-success mt-1 p-2 bold"><i class="ti-medall-alt"></i> Task dispatching</a>
                <a href="" class="btn btn-success mt-1 p-2 bold"><i class="ti-medall-alt"></i> Monitoring</a>
                <a href="" class="btn btn-success mt-1 p-2 bold"><i class="ti-medall-alt"></i> Reports</a>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 p-2">

            @if (session('success'))
                @success 
                @endsuccess
            @endif

            @if (session('danger'))
                @danger 
                @enddanger
            @endif

            @if (session('warning'))
                @warning
                @endwarning
            @endif
            
            {{-- Login form --}}
            <div class="container text-center text-dark"><h4>Connect with your account here: </h4></div>
            <form action="{{ route('login' )}}" method="POST" class="form border p-4">
                @csrf
                <input type="email" name="email" placeholder="Email" class="form-control" required /> 
                <span class="text-danger">{{ $errors->first('email') }}</span>
                <br>
                <input type="password" name="password" placeholder="Password" class="form-control" required /> 
                <span class="text-danger">{{ $errors->first('password') }}</span>
                <br>
                <button class="btn btn-dark-blue w-100"><b>Log in</b></button>
                <p class="w-100 clearfix">
                    <a href="{{ route('signup') }}" class="float-left text-dark">Create account</a> <a href="/" class="float-right text-dark">Forgot password?</a>
                </p>
            </form>
            
        </div>
    </div>
</div>
{{-- TEAM COMMUNITY --}}
<div class="container-fluid bg-silver-blue  text-center mt-5 pt-5">
    <div class="container">
        <h2>The community of TeamWork application</h2>
        <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta aperiam labore veniam vel eligendi quo earum exercitationem voluptas ad adipisci, quae autem nulla nam quas deserunt excepturi aliquid delectus pariatur?</h5>
    </div>
    <br>
    <div class="row m-0 mt-4">
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 team-bloc">
            <div class="card">
                <img class="card-img-top" src=" {{ asset('img/img_avatar1.png') }}" alt="Card image">
                <div class="card-body">
                  <p class="card-text">
                      <i>@John.Doe</i> <br> Software engineer at Google</p>
                  <a href="#" class="btn btn-success">See Profile</a>
                </div>
              </div>
        </div>

        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 team-bloc">
            <div class="card">
                <img class="card-img-top" src=" {{ asset('img/img_avatar5.png') }}" alt="Card image">
                <div class="card-body">
                  <p class="card-text">
                      <i>@Peter.Harsen</i> <br> Software engineer at Apple</p>
                  <a href="#" class="btn btn-success">See Profile</a>
                </div>
              </div>
        </div>

        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 team-bloc">
            <div class="card">
                <img class="card-img-top" src=" {{ asset('img/img_avatar1.png') }}" alt="Card image">
                <div class="card-body">
                  <p class="card-text">
                      <i>@Abdalah.Amed</i> <br> Software engineer at IBM</p>
                  <a href="#" class="btn btn-success">See Profile</a>
                </div>
              </div>
        </div>

        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 team-bloc">
            <div class="card">
                <img class="card-img-top" src=" {{ asset('img/img_avatar5.png') }}" alt="Card image">
                <div class="card-body">
                  <p class="card-text">
                      <i>@Tinah.Rick</i> <br> Software engineer at Facebook</p>
                  <a href="#" class="btn btn-success">See Profile</a>
                </div>
              </div>
        </div>

    </div>
</div>
<br>
{{-- REFERENCES --}}
<div class="container-fluid p-3 mt-5">
    <div class="container-fluid text-center">
        <h3 class="mb-5">They trust on us</h3>
        <div class="row m-0 p-0 refs">
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2">
                <img src="{{ asset('img/logo.png') }}" alt="edevy" title="Edevy" width="100%">
            </div>
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2">
                <img src="{{ asset('img/logo.png') }}" alt="edevy" title="Edevy" width="100%">
            </div>
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2">
                <img src="{{ asset('img/logo.png') }}" alt="edevy" title="Edevy" width="100%">
            </div>
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2">
                <img src="{{ asset('img/logo.png') }}" alt="edevy" title="Edevy" width="100%">
            </div>
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2">
                <img src="{{ asset('img/logo.png') }}" alt="edevy" title="Edevy" width="100%">
            </div>
            <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2">
                <img src="{{ asset('img/logo.png') }}" alt="edevy" title="Edevy" width="100%">
            </div>
        </div>
    </div>
</div>
<br>
{{-- NEWS LETTERS SUSCRIBING --}}
<div class="container mt-5 p-5">
    <div class="row m-0">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <h3><i>Stay tuned for all new features of teamwork, leave here your email: </i></h3>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            
            <form action="#" class="form new-letter">
                <div class="input-group">
                    <input type="text" class="form-control border-success" placeholder="Email address">
                    <div class="input-group-append">
                      <button class="btn btn-success">SUSCRIBE</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection