<?php

namespace App\Http\Controllers\BO;

use App\Http\Controllers\Controller;
use App\Models\{Account, Issue, Project};
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct() {
        $this->middleware('no_session_exist');
    }
    
    public function index(Account $account) {

        $recent_project = Project::where('created_by', $account->id_hashed)->limit(2)->orderBy('created_at', 'desc')->get();
        $recent_issue = Issue::where('added_by', $account->fullname)->join('stages', 'stages.id', '=', 'issues.stage_id')->limit(5)->orderBy('issues.created_at', 'desc')->get();

        return view('pages/BO/account/home', [
            'account' => $account,
            'recent_project' => $recent_project,
            'recent_issue' => $recent_issue
        ]);
    }

    public function setting(Account $account) {
        return view('pages/BO/account/setting', ['account' => $account]);
    }

    public function update(Request $request, $account) {

        $request->validate([
            'fullname' => 'bail|required|string|min:4|max:50',
            'email' => 'bail|required|email|min:8|max:60'
        ]);

        
        $update = Account::where('id_hashed', $account)->first();

        if(sha1($request->input('password')) === $update->password) {

            if($request->input('new_password') === $request->input('confirm_password')) {

                if($request->input('fullname') !== $update->getFullname()) {
                    $update->setFullname($request->input('fullname'));
                }
        
                if($request->input('email') !== $update->getEmail()) {
                    $update->setEmail($request->input('email'));
                }
        
                if($request->input('account_type') !== $update->getAccountType()) {
                    $update->setAccountType($request->input('account_type'));
                }
        
                if ($update->update()) {
                    session()->flash('success', 'Account updated successfully');
                    return redirect()->route('accounts.settings', ['account' => session('user_hashed_id')]);
                } else {
                    session()->flash('danger', 'Cannot update your account, please try later');
                    return redirect()->route('accounts.settings', ['account' => session('user_hashed_id')]);
                }

            } else {
                session()->flash('danger', 'You must confirm the new password in the confirm field');
                return redirect()->route('accounts.settings', ['account' => session('user_hashed_id')]);
            }
            
        } else {
            session()->flash('danger', 'Incorrect last password');
            return redirect()->route('accounts.settings', ['account' => session('user_hashed_id')]);
        }
        
    }

}
