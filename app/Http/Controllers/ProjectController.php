<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
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
            'category_id' => 'required',
            'deadline' => 'required',
            'task'=>'required',
        ]);

        $project = Project::create($request->all());
        // koppel user id en save

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
        $categories = Category::all();
        return view('projects.update')->with('project', $project)->with('categories', $categories);
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
            'category_id' => 'required',
            'deadline' => 'required',
            'task'=>'required',
        ]);

        $project = Project::find($id);

        $project->project_name = $request->input('project_name');
        $project->category_id = $request->input('category_id');
        $project->deadline = $request->input('deadline');
        $project->task = $request->input('task');

        $project->save();

        redirect()->route('projects.show', $project->id);
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

    public function search (Request $request){
        $search_text =$request->query('search');
        $projects = Project::where('project_name','like','%'. $search_text. '%')->get();
        $categories = Category::all();
        return view( 'projects.view', compact('projects', 'categories'));
    }

}

