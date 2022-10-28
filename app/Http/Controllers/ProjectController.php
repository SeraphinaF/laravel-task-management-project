<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('projects.view', compact('projects','categories'));
        //enkelvoud of meervoud?

//        $data = Project::all();
//        $categories = Category::all();
//        return view ('projects.view')->withProjects($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Find categories
        //Store in variables and pass into view
//        $categories = Category::all();
//        return view('projects.create', )->withCategories($categories);
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
            'project_name' => 'required|max:255',
            'category_id' => 'required',
            'deadline' => 'required',
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
    public function show($id)
    {
        //Show task page
//        $project = Project::find('project_id', [$project]);
//        return view('projects.task')with->;
//        return view("projects.task", ["project"=>$project]);
//
//        $project = Project::all();
//        return view("projects.task", ["project"=>$project]);
        $project = Project::find($id, );
        return view('projects.task',['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
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
            return redirect()->route('projects.index')->with(['message' => 'Successfully deleted!!']);
            }
        }
    }

