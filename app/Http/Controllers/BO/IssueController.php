<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $account, $project, $stage)
    {
        $new = new Issue();
        $new->setDescription($request->input('description'));
        $new->setStageId($stage);
        
        if ($request->input('owner') !== null) {
            $new->setOwner($request->input('owner'));
        }

        if ($request->input('notes') !== null) {
            $new->setNotes($request->input('notes'));
        }

        if ($new->save()) {
            return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project ]);
        } else {
            session()->flash('danger', 'Cannot add issue, please try later');
            return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project ]);
        }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $account, $project, $stage, $issue)
    {
        $update = Issue::find($issue);

        if($request->input('issue_description') != $update->getDescription()) {
            $update->setDescription($request->input('issue_description'));
        }

        if($request->input('owner') != $update->getOwner()) {
            $update->setOwner($request->input('owner'));
        }

        if($request->input('notes') != $update->getNotes()) {
            $update->setNotes($request->input('notes'));
        }

        if ($update->update()) {
            return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project ]);
        } else {
            session()->flash('danger', 'Cannot update issue, please try later');
            return redirect()->route('accounts.projects.show', ['account' => session('user_hashed_id'), 'project' => $project ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $modelsIssue)
    {
        //
    }
}
