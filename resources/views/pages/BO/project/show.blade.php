@extends('pages/BO/project/base')

@section('content')
    {{-- VUEJS APP --}}
    <div id="app">
        
        {{-- DELETE CONFIRM MODAL --}}
        <div class="modal fade" id="deleteConfirmModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title text-danger"><i class="ti-alert"></i> &nbsp; Delete project</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    This project will be deleted definitively, are you sure?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('accounts.projects.destroy', ['account' => session('user_hashed_id') , 'project' => $project->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-success">Yes, I'm sure</button> &nbsp; <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

                </div>
            </div>
        </div>

        {{-- ADD STAGE MODAL FORM --}}
        <div class="modal fade" id="addStageModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title"><i class="ti-plus"></i> &nbsp; Add new stage</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('accounts.projects.stages.store', ['account' => session('user_hashed_id'), 'project' => $project->id]) }}" method="post">
                        @csrf
                        <input type="text" name="stage_title" class="form-control" placeholder="Stage title"/> <br>
                        <button type="submit" class="btn btn-success">Add</button> &nbsp; <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

                </div>
            </div>
        </div>

        {{-- OPTION AND INFO --}}
        <div class="container-fluid p-2 bold border text-dark-blue d-flex justify-content-between align-items-center">
            <span>
                <i class="ti-info-alt" data-toggle="popover" data-content="{{ $project->description }}" title="Description"></i> &nbsp; {{ $project->title }} 
            </span>
            <span>
                <a href="/" class="btn btn-light text-dark-blue"><i class="ti-plus"></i> &nbsp; Invite</a>
                <a href="/" class="btn btn-light text-dark-blue">Notifications <span class="badge badge-danger">12</span></a>
                <a href="/" class="btn btn-light text-dark-blue">Members <span class="badge bg-dark-blue">7</span></a>
                <a href="/" class="btn btn-light text-dark-blue">Archives <span class="badge bg-dark-blue">93</span></a>
            </span>
            <span>
                <button type="button" class="btn btn-dark-blue" data-toggle="modal" data-target="#addStageModal" title="Add new stage" data-placement="bottom"><i class="ti-plus"></i></button>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmModal" title="Delete the project" data-placement="bottom"><i class="ti-trash"></i></button>
            </span>
        </div>
        <div class="container-fluid project-content mt-1 p-1">
            <div class="d-flex">
                
                <stage-bloc v-for="(stage, index) in {{ $stages }}" :key="index">

                    {{-- EDIT STAGE MODAL FORM --}}
                    <template #edit-stage-modal>
                        <edit-stage-modal 
                            account-id="{{ session('user_hashed_id') }}"
                            :project-id="stage.project_id"
                            :stage-id="stage.id"
                            :title-value="stage.title"
                            :button="'editStageModal' + index"
                            method="PUT"
                            token="{{ csrf_token() }}"
                        ></edit-stage-modal>
                    </template>

                    {{-- ADD ISSUE MODAL FORM --}}
                    <template #add-issue-modal>
                        <add-issue-modal
                            account-id="{{ session('user_hashed_id') }}"
                            :project-id="stage.project_id"
                            :stage-id="stage.id"
                            :stage-title="stage.title"
                            :button="'addIssueModal' + index"
                            token="{{ csrf_token() }}"
                            :owner-list="{{ $owners }}"
                        ></add-issue-modal>
                    </template>
                    
                    <template #stage-unity>
                        {{-- STAGE TITLE --}}
                        <stage-bloc-title :stage-title="stage.title">
                            <template #options>
                                <delete-stage-form 
                                    account-id="{{ session('user_hashed_id') }}"
                                    :project-id="stage.project_id"
                                    :stage-id="stage.id"
                                    method="DELETE"
                                    token="{{ csrf_token() }}"
                                ></delete-stage-form>
                                <button class="dropdown-item text-success" data-toggle="modal" :data-target="'#addIssueModal' + index"><i class="ti-plus"></i> &nbsp; Add issue</button>
                                <button class="dropdown-item text-dark" data-toggle="modal" :data-target="'#editStageModal' + index"><i class="ti-pencil-alt"></i> &nbsp; Edit</button>
                            </template>
                        </stage-bloc-title>
                        {{-- ISSUE LIST --}}
                        <template v-for='(issue, index) in @json($issues)'>
                            <template v-if="issue.stage_id === stage.id">

                                {{-- EDIT ISSUE MODAL FORM --}}
                                <edit-issue-modal
                                    account-id="{{ session('user_hashed_id') }}"
                                    :project-id="stage.project_id"
                                    :stage-id="stage.id"
                                    :button="'editIssueModal' + index"
                                    :issue-description="issue.description"
                                    :issue-id="issue.id"
                                    :issue-note="issue.notes"
                                    :issue-owner="issue.owner"
                                    :owner-list="{{ $owners }}"
                                    token="{{ csrf_token() }}"
                                    method="PUT"
                                ></edit-issue-modal>

                                {{-- ISSUE ITEM --}}
                                <div class="container-fluid p-1">
                                    <span class="btn border p-1 shadow d-flex justify-content-between align-self-start">
                                        <i class="ti-user" :title="issue.owner" v-if="issue.owner != undefined"></i>
                                        @{{ issue.description }}
                                        <div class="dropdown">
                                            <button type="button" class="btn btn dropdown-toggle pt-0 pr-1 pb-0 pl-1" data-toggle="dropdown"></button>
                                            <div class="dropdown-menu p-0">
                                                <button class="dropdown-item text-success"><i class="ti-check"></i> &nbsp; Archive</button>
                                                <button class="dropdown-item text-dark" data-toggle="modal" :data-target="'#editIssueModal' + index"><i class="ti-pencil-alt"></i> &nbsp; Edit</button>
                                                <button class="dropdown-item text-danger"><i class="ti-trash"></i> &nbsp; Delete</button>
                                                @foreach ($stages as $stage)
                                                    <button class="dropdown-item text-dark">Move to {{ $stage->title }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </span>
                                </div>

                            </template>
                        </template>
                    </template>

                </stage-bloc>

            </div>
        </div>
    
    
        {{-- <toast v-if=@json(session('success') !== null) title="Success" text="{{session('success')}}" type="success"></toast>
        <toast v-if=@json(session('danger') !== null) title="Danger" text="{{session('danger')}}" type="danger"></toast> --}}
    </div>
@endsection