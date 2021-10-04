<?php

namespace App\Http\Controllers\FO;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('session_exist');
    }

    public function __invoke()
    {
        return view('welcome');
    }
}
