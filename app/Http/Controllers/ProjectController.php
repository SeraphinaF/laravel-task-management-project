<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\NoReturn;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $projects = Project::where('users_id','=', $user->id)->get();
        return view('projects.view', compact('projects',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('projects.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'category' => 'required',
            'deadline' => 'required',
            'task'=>'required'
        ]);

        $project = new Project();
        $project->users_id = \Auth::id();
        $project->project_name = request('project_name');
        $project->category = request('category');
        $project->deadline = request('deadline');
        $project->task = request('task');

        $project->save();
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $project = Project::find($id);
        return view('projects.show', compact('project'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function hide($id)
    {
        $project = Project::find($id);
        $projectCount = $project->count();
        if($projectCount>2) {
            $project->visible = 0;
            $project->save();
            return back();
        }else{
         session()->flash('error', 'Sorry, you will need at least 2 projects before you can hide one.' );
         return back();
        }
    }

    public function showAgain($id)
    {
        $project = Project::find($id);
        $project->visible = 1;
        $project->save();
        return back();
    }

    public function edit($id)
    {
        $project = Project::find($id);
        if (\Auth::user()->admin === 1) {
            $categories = Category::all();
            return view('projects.update')->with('project', $project)->with('categories', $categories);
        } elseif ($project['users_id'] === \Auth::id()) {
            $categories = Category::all();
            return view('projects.update')->with('project', $project)->with('categories', $categories);
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required',
            'deadline' => 'required',
            'task'=>'required',
        ]);

        $project = Project::find($id);
        $project->project_name = $request->input('project_name');
        $project->deadline = $request->input('deadline');
        $project->task = $request->input('task');

        $project->save();

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $project = Project::where('id', $id)->first();
        if ($project != null) {
            $project->delete();
            return redirect()->route('projects.index')->with(['message' => 'Successfully deleted!']);
        }
    }

    public function search(Request $request)
    {
        $searchTerm = $request->query('text');

        $projects = Project::where('project_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('category', $searchTerm)
            ->get();

        return view('projects.view',compact('projects'));
    }
}

