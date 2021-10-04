<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use App\Models\{Account, Issue, Project, Stage};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    private $owners;

    public function __construct()
    {
        // Middleware
        $this->middleware('no_session_exist');

        // Global datas
        $this->owners = Account::all()->pluck('fullname');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_projects = Project::where('created_by', session('user_hashed_id'))->select('id', 'title', 'description', 'created_at')->get();

        $project_count = Project::where('created_by', session('user_hashed_id'))->count();

        $favoris = Project::where(['is_favoris' => true, 'created_by' => session('user_hashed_id')])->get();
        
        $favoris_count = Project::where(['is_favoris' => true, 'created_by' => session('user_hashed_id')])->count();

        return view('pages/BO/project/index', [
            'owners' => $this->owners,
            'projects' => $all_projects,
            'project_count' => $project_count,
            'favoris' => $favoris,
            'favoris_count' => $favoris_count,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFormRequest $request)
    {
        $new_project = new Project();

        if($request->input('notes') !== null) {
            $new_project->setNotes($request->input('notes'));
        }

        if($request->input('owner') !== null) {
            $new_project->setOwner($request->input('owner'));
        }

        $new_project->setTitle($request->input('title'));
        $new_project->setDescription($request->input('description'));
        $new_project->setCreatedBy(session('user_hashed_id'));

        if ($new_project->save()) {
            session()->flash('success', 'Project created successfully');
            return redirect()->route('accounts.projects.index', ['account' => session('user_hashed_id')]);
        } else {
            session()->flash('danger', 'Cannot create this project, please try later');
            return redirect()->route('accounts.projects.create', ['account' => session('user_hashed_id')]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($account, $project)
    {

        $all_projects = Project::where('created_by', $account)->select('id', 'title', 'description', 'created_at')->get();

        $project_count = Project::where('created_by', $account)->count();

        $favoris = Project::where(['is_favoris' => true, 'created_by' => $account])->get();
        
        $favoris_count = Project::where(['is_favoris' => true, 'created_by' => $account])->count();

        $info = Project::find($project);
        
        $issues_list = [];

        $stages = Stage::where('project_id', $project )->get();

        foreach($stages as $stage){

            $issues = Issue::where('stage_id', $stage->id)->get();

            foreach ($issues as $issue) {
                array_push($issues_list, $issue );
            }

        }

        return view('pages/BO/project/show', [
            'project' => $info,
            'projects' => $all_projects,
            'project_count' => $project_count,
            'favoris' => $favoris,
            'favoris_count' => $favoris_count,
            'stages' => $stages,
            'issues' => $issues_list,
            'owners' => $this->owners,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($account, $project)
    {
        $all_projects = Project::where('created_by', session('user_hashed_id'))->select('id', 'title', 'description', 'created_at')->get();

        $project_count = Project::where('created_by', session('user_hashed_id'))->count();

        $favoris = Project::where(['is_favoris' => true, 'created_by' => session('user_hashed_id')])->get();
        
        $favoris_count = Project::where(['is_favoris' => true, 'created_by' => session('user_hashed_id')])->count();

        $info = Project::find($project);
        
        return view('pages/BO/project/edit', [
            'owners' => $this->owners,
            'project' => $info, 
            'projects' => $all_projects,
            'project_count' => $project_count,
            'favoris' => $favoris,
            'favoris_count' => $favoris_count,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $account, $project)
    {
        $request->validate([
            'title' => 'bail|required|min:5|max:50',
            'description' => 'bail|required|min:20|max:1000'
        ]);

        $info = Project::find($project);

        if($request->input('notes') !== null && $request->input('notes') !== $info->notes) {
            $info->setNotes($request->input('notes'));
        }

        if($request->input('owner') !== null && $request->input('owner') !== $info->owner) {
            $info->setOwner($request->input('owner'));
        }

        if($request->input('title') !== $info->title) {
            $info->setTitle($request->input('title'));
        }

        if ($request->input('description')!== $info->description) {
            $info->setDescription($request->input('description'));
        }

        if ($info->update()) {
            session()->flash('success', 'Project updated successfully');
            return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $info->id ]);
        } else {
            session()->flash('danger', 'Cannot update this project, please try later');
            return redirect()->route('accounts.projects.edit', ['account' => session('user_hashed_id'), 'project' => $info->id ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($account, $project)
    {
        $project = Project::find($project);

        if ($project->delete()) {
            session()->flash('success', 'Project deleted successfully');
            return redirect()->route('accounts.projects.index', ['account' => session('user_hashed_id')]);
        } else {
            session()->flash('danger', 'Cannot delete this project, please try later');
            return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project->id ]);
        }
    }
}
