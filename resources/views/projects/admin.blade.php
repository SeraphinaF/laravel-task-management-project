@extends('layouts.app')

@section('content')
    <div class="">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create new project</a>
    </div>

    <form method="put" action="{{url('/search')}}" >
        <input type="text" name="search" placeholder="Find projects">
    </form>

    <form method="put" action="{{url('/filter')}}" >
        <select name="category">
            <option value="Home">Home</option>
            <option value="School">School</option>
            <option value="Social">Social</option>
        </select>

        <button type="submit" class="btn btn-secondary">Filter</button>
    </form>

    <a href="{{ route('projects.index' )}}">Clear filters</a>

    <table class="">
        <tr>
            <td><strong>Project Name</strong></td>
            <td><strong>Category</strong></td>
            <td><strong>Deadline</strong></td>
        </tr>
        @foreach($projects as $project)
            <tr>
                <td>{{$project['project_name']}}</td>
                <td>{{$project['category']}}</td>
                <td>{{$project['deadline']}}</td>
                <td><a href="{{ route('show', ['id'=>$project['id']])}}" class="btn btn-primary">View</a></td>
                <td><a href="{{ route('delete', ['id'=> $project['id']])}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
    </table>
    </div>
    <div class="project-count">
        <h3>Hi admin, there are 3 projects at the moment!</h3>
    </div>
@endsection
