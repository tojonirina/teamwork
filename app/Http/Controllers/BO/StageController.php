<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $account, $project)
    {
        $new = new Stage();
        $new->setTitle($request->input('stage_title'));
        $new->setProjectId($project);

        if(!$new->save()) {
            session()->flash('danger', 'Cannot add stage, please try later');
        } 

        return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $account, $project, $stage)
    {
        $update = Stage::find($stage);

        if($request->input('stage_title') !== $update->getTitle()) {
            $update->setTitle($request->input('stage_title'));
            $update->update();
        }

        return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($account, $project, $stage)
    {
        $delete = Stage::find($stage);

        if(!$delete->delete()) {
            session()->flash('danger', 'Cannot delete stage, please try later');
        }

        return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project]);
    }
}
