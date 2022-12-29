<?php
?>

@extends('layouts.app')
@vite('resources/sass/home.scss');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                        @if($errors->any)
                            @foreach($errors->all() as $error)
                                ERROR: {{$error}}<br>
                            @endforeach
                        @endif

                    <form class="create-form" action="{{route('projects.store')}}" method="post">
                        @csrf
                        <input name="project_name" type="text" class="input-field" value="" >
                        <label class="input-label">Project name</label>

                        <input name="deadline" type="datetime-local" class="input-field" value="" >
                        <label class="input-label">Deadline</label>

                        <input name="task" type="text" class="input-field" value="" >
                        <label class="input-label">Deadline</label>

                        <select name="category" required>
                            <option value="Home">Home</option>
                            <option value="School">School</option>
                            <option value="Social">Social</option>
                        </select>

                        <button class="btn btn-primary">Create</button>

                    </form>
                        {{--                        <form class="card-form" action="{{route('projects.store')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="input">--}}
{{--                                <input type="text" name="project_name" class="input-field" value="" >--}}
{{--                                <label class="input-label">Project name</label>--}}
{{--                                @error('project_name')--}}
{{--                                <div class="error">{{$message}}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <label class="input-label">Category</label>--}}
{{--                            <select name="category" class="input-field">--}}
{{--                                <option value="home"></option>--}}
{{--                                <option value="school"></option>--}}
{{--                                <option value="social"></option>--}}

{{--                                @error('category')--}}
{{--                                <div class="error">{{$message}}</div>--}}
{{--                                @enderror--}}
{{--                            </select>--}}

{{--                            <div class="input">--}}
{{--                                <input type="datetime-local" name="deadline" class="input-field" value="" >--}}
{{--                                <label class="input-label">Deadline</label>--}}
{{--                                @error('deadline')--}}
{{--                                <div class="error">{{$message}}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="description">Task:</label>--}}
{{--                                <textarea type="text" name="task" wire:model="task" class="form-control" id="taskDescription">{{{ $description ?? '' }}}</textarea>--}}
{{--                                @error('task') <span class="error">{{ $message }}</span> @enderror--}}
{{--                            </div>--}}
{{--                            <div class="action">--}}
{{--                                <button class="action-button" type="submit">Get started</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div> -->--}}

<!--
            </div>
        </div> -->
    </div>
    </div>
    </div>
@endsection
