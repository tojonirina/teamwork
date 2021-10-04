@extends('layouts/back-office')

@section('body')
<div class="container-fluid p-2">
    <div class="row m-0">
        <div class="col-sm-12 col-md-6 col-lg-7 col-xl-8">

            {{-- Alert for all new --}}
            <div class="alert bg-success text-white alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h3>What's New?</h3> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nam nemo provident sed fuga corporis vel sunt optio, exercitationem, laborum modi natus quisquam est praesentium ratione aspernatur, quod officia nostrum!
            </div>

            {{-- New post and project link --}}
            <div class="container-fluid p-0 mt-2 mb-2">
                <a href="#" class="btn btn-success">New post</a>
            </div>


            {{-- Recent project --}}
            <div class="container border p-2"><strong>Recent project</strong></div>

            <div class="container-fluid p-0 mt-1">
                <div class="row m-0">
                    @foreach ($recent_project as $project)
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 p-1">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ Str::words($project->title, 4, '...') }}</h4>
                                    <p class="card-text">{{ Str::words($project->description, 9, '...')}}</p>
                                    <a href="#" class="card-link">See more</a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>


            {{-- Recent issue --}}
            <div class="container border p-2"><strong>Recent Issue</strong></div>

            <div class="container-fluid p-0 mt-1">
                <div class="row m-0">

                    @foreach ($recent_issue as $issue)
                        
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 p-1">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $issue->description }}</h5>
                                    <a href="{{ route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $issue->project_id ]) }}" class="card-link">See more</a>
                                </div>
                            </div>

                        </div>

                    @endforeach
                    
                </div>
            </div>
            
        </div>

        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4">

            <div class="alert bg-dark-blue alert-dismissible sticky-top">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h3>Topics</h3> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nam nemo provident sed fuga corporis vel sunt optio, exercitationem, laborum modi natus quisquam est praesentium ratione aspernatur, quod officia nostrum!
            </div>

            <div class="alert bg-dark-blue alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h3>Forum</h3> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nam nemo provident sed fuga corporis vel sunt optio, exercitationem, laborum modi natus quisquam est praesentium ratione aspernatur, quod officia nostrum!
            </div>

            {{-- Recent post --}}
            <div class="container border p-2"><strong>Recent post</strong></div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Post title</h4>
                    <p class="card-text">Some example text. Some example text.</p>
                    <a href="#" class="card-link">See more</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Post title</h4>
                    <p class="card-text">Some example text. Some example text.</p>
                    <a href="#" class="card-link">See more</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection