@extends('layouts.app')

@section('content')
    <div class="">
        <a href="{{ route('projects.create') }}">Create new project</a>
        <a href="{{ route('projects.create') }}">Add new category</a>
    </div>

    <form method="get" action="{{url('/search')}}">
        <input type="text" name="search" placeholder="Find projects">
    </form>
        <table class="">

            @foreach($categories as $category)
            <tr>
                <td>{{$category['name']}}</td>
            </tr>
            <tr>
                <td><strong>Project Name</strong></td>
                <td><strong>Deadline</strong></td>
            </tr>
                @foreach($projects as $project)
            <tr>
                <td>{{$project['project_name']}}</td>
                <td>{{$project['deadline']}}</td>
                <td><a href="{{ route('details', ['id'=>$project['id']])}}">View</a></td>
                <td><a href="{{ route('delete', ['id'=> $project['id']])}}">Delete</a></td>
{{--                href="{{ route('projects.show', $project->id) }}"--}}
{{--                href="/projects/{{$project->id}}"--}}
            </tr>
            @endforeach
            @endforeach
        </table>
    </div>
@endsection
