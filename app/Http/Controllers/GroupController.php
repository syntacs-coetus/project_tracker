<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Groups;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function getGroups(){
        $group = new Groups();
        return $group->fetchGroups();
    }

    public function index()
    {
        return view('tracker.home');
    }
}
