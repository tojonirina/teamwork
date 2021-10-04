@extends('pages/BO/project/base')

@section('content')
    {{-- ADD PROJECT MODAL --}}
    <div class="modal fade" id="addProjectModal">
        <div class="modal-dialog">
        <div class="modal-content">
    
            <div class="modal-header">
            <h4 class="modal-title text-dark-blue"><i class="ti-plus"></i> &nbsp; Create new project</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <div class="modal-body">
                <form action="{{ route('accounts.projects.store', session('user_hashed_id')) }}" class="form mt-1 border p-2" method="POST">
                    @csrf
                    <input type="text" name="title" class="form-control" placeholder="Project title" required /> 
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    <br>
                    <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    <br>
                    <select name="owner" class="form-control" required>
                        <option>-- Choose project's owner--</option>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner }}">{{ $owner }}</option>
                        @endforeach
                    </select> <br>
                    <textarea name="notes" class="form-control" placeholder="Notes"></textarea> <br>
                    <button class="btn btn-dark-blue">Validate</button> &nbsp; <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
    
        </div>
        </div>
    </div>

    {{-- New project button --}}
    <button type="button" data-toggle="modal" data-target="#addProjectModal" class="btn btn-success bold mb-2 btn-new"><i class="ti-plus"></i> New project</button>
    <br>
    {{-- Project list --}}
    <div class="container border p-2"><strong>My project </strong></div>
    <div class="container-fluid p-0 mt-1">
        <div class="row m-0">
            @foreach ($projects as $project)
                
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-1">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ Str::words($project->title, 3, '...')}}</h4>
                            <span class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project->id ]) }}" class="card-link">See more</a>
                                <span>
                                    <a href="{{ route('accounts.projects.edit', ['account' => session('user_hashed_id'), 'project' => $project->id ]) }}" class="btn p-1" data-toggle="tooltip" data-placement="bottom" title="Edit project"><i class="ti-pencil-alt"></i></a> 
                                    <button class="btn p-1" data-toggle="tooltip" data-placement="bottom" title="Add to favorite"><i class="ti-star"></i></button>
                                    <button class="btn p-1" data-toggle="popover" title="{{ 'Description - ' . '(' . $project->getCreatedAt() . ')' }}" data-content="{{ $project->getDescription() }}"><i class="ti-info-alt"></i></button>
                                </span>
                            </span>
                        </div>
                    </div>

                </div>

            @endforeach
        </div>
    </div>

    {{-- VUEJS APP --}}
    <div id="app">
        <toast v-if="@json(session('success') != null)" title="Success" text="{{ session('success') }}" type="success"></toast>
        <toast v-if="@json(session('danger'))" title="@json(session('danger'))" text="Ok okay" type="danger"></toast>
    </div>
@endsection