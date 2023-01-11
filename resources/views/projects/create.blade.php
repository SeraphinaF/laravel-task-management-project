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
                        <label class="input-label">Project name</label>
                        <input name="project_name" type="text" class="input-field" value="" >

                        <label class="input-label">Deadline</label>
                        <input name="deadline" type="datetime-local" class="input-field" value="" >

                        <label class="input-label">Task</label>
                        <input name="task" type="text" class="input-field" value="" >

                        <label>Category</label>
                        <select name="category" required>
                            <option value="Home">Home</option>
                            <option value="School">School</option>
                            <option value="Social">Social</option>
                        </select>

                        <button class="btn btn-primary">Create</button>

                    </form>
                </div>
            </div>
        </div>
@endsection
