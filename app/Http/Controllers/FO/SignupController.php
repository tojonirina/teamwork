<?php

namespace App\Http\Controllers\FO;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpFormRequest;
use App\Models\Account;

class SignupController extends Controller
{
    public function __construct()
    {
        $this->middleware('session_exist')->only('index');
    }
    /**
     * Get signup page.
     */
    public function index()
    {
        return view('pages/FO/signup');
    }

    /**
     * Create a new account
     * @param $request
     */
    public function post(SignUpFormRequest $request) {

        $account = new Account();

        $account->setFullname($request->input('fullname'));
        $account->setEmail($request->input('email'));
        $account->setPassword($request->input('password'));
        $account->setIdHashed($this->generate_code());

        $new_record = $account->save();

        if ($new_record) {

            session()->flash('success', 'Congrats, your free account is created successfully');
            return redirect()->route('home');

        } else {

            session()->flash('danger', 'Sorry, Could not create the account, Please try later');
            return redirect()->route('signup');
            
        }

    }

    // Private function

    /**
     * Generate a mixed code exemple: h7fRs04Ky3
     * @param int $number
     */
    private function generate_code(int $number = 10): string {
    
        $upc = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $lowc = str_split('abcdefghijklmnopqrstuvwxyz');
        $num = str_split('0123456789');
        $code = "";
    
        while (strlen($code) < $number) {
            if (rand(1, 3) === 1) {
                $code .= $upc[rand(0, 25)];
            } elseif (rand(1, 3) === 2) {
                $code .= $lowc[rand(0, 25)];
            } else {
                $code .= $num[rand(0, 9)];
            } 
        }
        return $code;
    }
}
