<?php

namespace App\Http\Controllers\FO;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\Account;

class LoginController extends Controller
{

    public function login(LoginFormRequest $request) {

        $account = Account::where('email', $request->input('email'))
            ->where('password', sha1($request->input('password'))
        )->first();
        
        if ($account) {

            // Set session
            session(['user_hashed_id' => $account->id_hashed]);
            session(['user_fullname' => $account->fullname]);
            session(['user_email' => $account->email]);
            session(['user_account_type' => $account->account_type]);
            
            return redirect()->route('accounts.index', [$account->id_hashed]);

        } else {

            session()->flash('danger', 'Incorrect email or password');
            return redirect()->route('home');
            
        }
    }

    public function logout() {

        session()->flush();
        session()->flash('warning', 'You are disconnected');
        return redirect()->route('home');
        
    }
}
