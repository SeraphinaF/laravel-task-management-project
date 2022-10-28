@extends('layouts.app')
@section('content')

        <div class="container">
{{--                @foreach($projects as $project)--}}
{{--                    <h2>{{$project['project_name']}}</h2>--}}
{{--                    <h2>{{$project['deadline']}}</h2>--}}
{{--                @endforeach--}}
            <div class="form">
                <input type="text" class="input" />
                <input type="submit" class="add" value="" />
            </div>
{{--            @foreach($projects as $project)--}}
{{--            <div class="tasks">{{$project['task']}}</div>--}}
{{--            @endforeach--}}
            <button class="action-button" type="submit">DONE!</button>
            //style met de delete-all
        </div>
@endsection

