@extends('layouts.app')

@section('content')

    <div class="">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create new project</a>
    </div>

    <form method="put" action="{{url('/search')}}" >
        <input type="text" name="text" placeholder="Find projects">
    </form>

    <form method="put" action="{{url('/search')}}" >
        <select name="text">
            <option value="Home">Home</option>
            <option value="School">School</option>
            <option value="Social">Social</option>
        </select>
        <button type="submit" class="btn btn-secondary">Filter</button>
    </form>
    <a href="{{ route('projects.index' )}}">Clear filters</a>


    @foreach($projects as $project)
      @if($project->visible === 1)
            <table>
                <tr>
                    <td><strong>Project Name</strong></td>
                    <td><strong>Category</strong></td>
                    <td><strong>Deadline</strong></td>
                </tr>
                    <tr>
                        <td>{{$project['project_name']}}</td>
                        <td>{{$project['category']}}</td>
                        <td>{{$project['deadline']}}</td>
                        <td><a href="{{ route('view', $project->id)}}" class="btn btn-primary">View</a></td>
                        <td><a href="{{ route('hide', $project->id)}}" class="btn btn">Hide</a></td>
                        <td><a href="{{ route('delete', $project->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
            </table>
     @else
            <table class="project" style="opacity: 0.5">
                <tr>
                    <td><strong>Project Name</strong></td>
                    <td><strong>Category</strong></td>
                    <td><strong>Deadline</strong></td>
                </tr>
                    <tr>
                        <td>{{$project['project_name']}}</td>
                        <td>{{$project['category']}}</td>
                        <td>{{$project['deadline']}}</td>
                        <td><a href="{{ route('view', $project->id)}}" class="btn btn-primary">View</a></td>
                        <td><a href="{{ route('showAgain', $project->id)}}" class="btn btn-success">Show</a></td>
                        <td><a href="{{ route('delete', $project->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
            </table>
      @endif
    @endforeach
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
@endsection
