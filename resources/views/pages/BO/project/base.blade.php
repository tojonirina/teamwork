@extends('layouts/back-office')

@section('body')
    <div class="container-fluid p-2">
        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 p-1">

                {{-- All project list --}}
                <div class="dropdown dropright">
                    <button type="button" class="btn btn-dark-blue dropdown-toggle d-flex justify-content-between align-items-center w-100" data-toggle="dropdown">
                      <i class="ti-dashboard"></i> &nbsp; All Projects <span class="badge badge-danger badge-pill">{{ $project_count }}</span>
                    </button>
                    <div class="dropdown-menu">
                        @foreach ($projects as $project)
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project->id ]) }}">
                                {{ Str::words($project->title, 2, '...') }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Favorite link --}}
                <div class="dropdown dropright mt-1">
                    <button type="button" class="btn btn-dark-blue dropdown-toggle d-flex justify-content-between align-items-center w-100" data-toggle="dropdown">
                      <i class="ti-star"></i> &nbsp; Favorites <span class="badge badge-danger badge-pill">{{ $favoris_count }}</span>
                    </button>
                    <div class="dropdown-menu">
                        @foreach ($favoris as $project)
                            <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project->id ]) }}">
                                {{ Str::words($project->title, 2, '...') }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Collaboration link --}}
                <div class="dropdown dropright mt-1">
                    <button type="button" class="btn btn-dark-blue dropdown-toggle d-flex justify-content-between align-items-center w-100" data-toggle="dropdown">
                      <i class="ti-user"></i> &nbsp; Collaborations <span class="badge badge-danger badge-pill">2</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                          Project title
                        </a>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                            Project title
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10 p-1">
                @yield('content')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.toast').toast('show');
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
            $('.project-content').css({'height': window.innerHeight - 130 + 'px'});
        });
    </script>
@endsection