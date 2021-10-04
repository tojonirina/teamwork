@extends('layouts/front-office')

@section('stylesheet')

    <style>
        .signup-form {
            width: 40%;
        }

        @media only screen and (max-width: 540px) {
            .signup-form {
                width: 100%;
            }
        }
    </style>
    
@endsection

@section('body')

<div class="container-fluid p-5">
    <div class="container">

        @if (session('danger'))
            @danger
            @enddanger
        @endif

    </div>
    
    <div class="container text-center mt-2">
        <h4>Create your account here, it's FREE</h4>
    </div> 
    <br>
    <form class="form m-auto signup-form" method="POST" action="{{ route('signup.post') }}" >
        @csrf
        <input type="text" name="fullname" class="form-control" placeholder="Full name" required />
        <span class="text-danger">{{ $errors->first('fullname') }}</span>
        <br>
        <input type="email" name="email" class="form-control" placeholder="Email address" required /> 
        <span class="text-danger">{{ $errors->first('email') }}</span>
        <br>
        <input type="password" name="password" class="form-control" placeholder="Choose your password" required /> 
        <span class="text-danger">{{ $errors->first('password') }}</span>
        <br>
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password" required /> 
        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
        <br>
        <span class="container-fluid p-0">
            <input type="checkbox" name="agree_for_policy" value="true" id="policy" required /> <label for="policy"> agree for all private date usage policy </label>
            <br>
            <span class="text-danger">{{ $errors->first('agree_for_policy') }}</span>
        </span> 
        <br> <br>
        <button class="btn btn-dark-blue w-100"><b> Validate </b></button>
        <a href="{{ route('home') }}" class="text-secondary">Already have an account ?</a>
    </form>
</div>
    
@endsection