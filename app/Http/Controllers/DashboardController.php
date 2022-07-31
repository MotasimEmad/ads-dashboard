<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Count;
use App\Models\Project;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::count();
        $sales = User::where('role', 'Sale')->count();
        $projects = Project::paginate(6);
        $projects2 = Project::where('state', '0')->get();
        return view('home', compact('users', 'sales', 'projects', 'projects2'));
    }
}
