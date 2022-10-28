@extends('layouts.app')
@section('content')

        <div class="container">
            <h1>Title</h1>
            <div class="form">
                <input type="text" class="input" />
                <input type="submit" class="add" value="" />
            </div>
@foreach($project->id as $project)
            <div class="tasks">{{$project->task}}</div>
            @endforeach

            <button class="action-button" type="submit">DONE!</button>
            //style met de delete-all
        </div>
@endsection

