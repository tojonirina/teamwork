@extends('layouts/front-office')

@section('body')
    <div class="container alert-warning mt-5 p-4">
        <h1>500 Error, Server Error</h1>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem pariatur at nesciunt ducimus rem dolore sapiente iure molestias deleniti delectus aut, voluptatibus officia ipsum quod voluptas libero, maxime dolores expedita! <hr>
        <a href="{{ route('home') }}" class="btn btn-primary">Go to home page</a> &nbsp; <a href="#" class="btn btn-success">Report a bug</a>
    </div>
@endsection
@section('footer')
    
@endsection