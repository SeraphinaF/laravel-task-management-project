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

                <div class="container">
                    <!-- code here -->
                    <div class="card">
                        <div class="card-image">
                            <h2 class="card-heading">
                                Get started<br>
                                <small>Let's get productive!</small>
                            </h2>
                        </div>
                        @if($errors->any)
                            @foreach($errors->all() as $error)
                                ERROR: {{$error}}<br>
                            @endforeach
                        @endif
                        <form class="card-form" action="{{route('projects.store')}}" method="post">
                            @csrf
{{--                            {{$errors}}--}}
                            <div class="input">
                                <input type="text" name="project_name" class="input-field" value="" >
                                <label class="input-label">Project name</label>
                                @error('project_name')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>

                            <label class="input-label">Category</label>
                            <select name="category_id" class="input-field">
                                <option value=""></option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                                @error('category_id')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </select>

                            <div class="input">
                                <input type="datetime-local" name="deadline" class="input-field" value="" >
                                <label class="input-label">Deadline</label>
                                @error('deadline')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="action">
                                <button class="action-button" type="submit">Get started</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
