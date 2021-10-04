@extends('pages/BO/project/base')

@section('content')
    <div class="container-fluid p-2">
        <div class="container-fluid p-2 border bold text-dark-blue h5"><i class="ti-plus"></i> &nbsp; Create a new project</div>
        <form action="{{ route('accounts.projects.store', session('user_hashed_id')) }}" class="form mt-1 border p-2" method="POST">
            @csrf
            <input type="text" name="title" class="form-control" placeholder="Project title" required /> 
            <span class="text-danger">{{ $errors->first('title') }}</span>
            <br>
            <textarea name="description" class="form-control" placeholder="Description" required></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
            <br>
            <select name="owner" class="form-control" required>
                <option>--Choisissez--</option>
                @foreach ($owners as $owner)
                    <option value="{{ $owner }}">{{ $owner }}</option>
                @endforeach
            </select> <br>
            <textarea name="notes" class="form-control" placeholder="Notes"></textarea> <br>
            <button class="btn btn-dark-blue">Validate</button> &nbsp; <a href="{{ route('accounts.projects.index', session('user_hashed_id')) }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection