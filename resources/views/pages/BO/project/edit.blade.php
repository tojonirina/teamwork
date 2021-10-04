@extends('pages/BO/project/base')

@section('content')
    <div class="container-fluid p-2">
        <div class="container-fluid p-2 border bold text-dark-blue h5"><i class="ti-pencil-alt"></i> &nbsp; Edit project</div>
        <form action="{{ route('accounts.projects.update', ['account' => session('user_hashed_id'), 'project' => $project->id ]) }}" class="form mt-1 border p-2" method="POST">
            @method('PUT')
            @csrf
            <input type="text" name="title" value="{{ $project->title }}" class="form-control" placeholder="Project title" required /> 
            <span class="text-danger">{{ $errors->first('title') }}</span>
            <br>
            <textarea name="description" class="form-control" placeholder="Description" required>{{ $project->description }}</textarea>
            <span class="text-danger">{{ $errors->first('decription') }}</span>
            <br>
            <select name="owner" class="form-control">
                <option value="{{ $project->owner }}">{{ $project->owner }}</option>
                @foreach ($owners as $owner)
                    <option value="{{ $owner }}">{{ $owner }}</option>
                @endforeach
            </select> <br>
            <textarea name="notes" value="{{ $project->notes }}" class="form-control" placeholder="Notes"></textarea> <br>
            <button class="btn btn-dark-blue">Save</button> &nbsp; <a href="{{ route('accounts.projects.index', session('user_hashed_id')) }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
    {{-- VUEJS APP --}}
    <div id="app">
        <toast v-if="@json(session('danger'))" title="Danger" text="{{ session('danger') }}" type="danger"></toast>
    </div>
@endsection