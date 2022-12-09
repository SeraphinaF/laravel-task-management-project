@extends('layouts.app')

@section('content')
    <div class="">
        <a href="{{ route('projects.create') }}">Create new project</a>
    </div>

    <form method="put" action="{{url('/search')}}" >
        <input type="text" name="search" placeholder="Find projects">
    </form>

    <form method="put" action="{{url('/filter')}}" >
        <select name="category_id">
            <option value=""></option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
        </select>

        <button type="submit" class="btn btn-secondary">Filter</button>
    </form>

    <a href="{{ route('projects.index' )}}">Clear filters</a>

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
                <td><a href="{{ route('show', ['id'=>$project['id']])}}">View</a></td>
                <td><a href="{{ route('delete', ['id'=> $project['id']])}}">Delete</a></td>
            </tr>
            @endforeach
            @endforeach
        </table>
    </div>
@endsection
