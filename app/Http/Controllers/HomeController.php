<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(): View
    {
        return view('home.index');
    }
}
