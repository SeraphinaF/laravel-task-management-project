<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $this->middleware('admin')->except('index', 'show');
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('projects.view', compact('projects','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('projects.create', compact('projects','categories'));
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
            'task'=>'required',
        ]);

        $project = new Project();
        $project->users_id = \Auth::id();
        $project->project_name = request('project_name');
        $project->category = request('category');
        $project->deadline = request('deadline');
        $project->task = request('task');

        $project->save();

//        $project = Project::create($request->all());

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $project = Project::find($id);

        $categories = Category::find($id);
            return view('projects.show')->with('project', $project)->with('categories', $categories);
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

        $projectsCreated = Project::where('users_id', '=', \Auth::id()->count());
        if ($projectsCreated > 2) {
//            if ($project != null) {
                $project->delete();
                return redirect()->route('projects.index')->with(['message' => 'Successfully deleted!']);
        } else {
            abort(Response::HTTP_FORBIDDEN);
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

