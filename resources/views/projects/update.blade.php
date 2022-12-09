@extends('layouts.app')
@section('content')

    <form action="{{route('projects.update', [$project->id])}}" method="post">
        @method('PUT')
        @csrf {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Project Name:</label>
                <input type="text" name="project_name" wire:model="project_name" class="form-control" id="taskTitle" value="{{$project->project_name}}">
                @error('project_name') <span class="error">{{ $message }}</span> @enderror
            </div>

{{--            <select name="category_id" wire:model="category_id"  class="input-field">--}}
{{--                <label for="">Category:</label>--}}
{{--                @foreach($categories as $category)--}}
{{--                            <option value="{{$category->name}}">{{$category->name}}</option>--}}
{{--                @endforeach--}}
{{--                @error('category') <span class="error">{{ $message }}</span> @enderror--}}
{{--            </select>--}}

            <div class="form-group">
                <label class="input-label">Deadline:</label>
                <input type="datetime-local" name="deadline"  wire:model="deadline" class="form-control"  id="taskDescription" value="{{$project->deadline}}">
                @error('deadline') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Task:</label>
                <input type="text" name="task" wire:model="task" class="form-control" id="taskDescription" value="{{$project->task}}"></input>
                @error('task') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="action">
                <button class="action-button" type="submit">Edit</button>
            </div>
    </form>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
