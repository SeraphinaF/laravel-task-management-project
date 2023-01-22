<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $projects = Project::all();
        $users= User::all();
        return view('projects.admin', compact('projects', 'users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user != null){
            $user->delete();
        }
        return back();
    }
}
