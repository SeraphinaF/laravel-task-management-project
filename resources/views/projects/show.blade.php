@extends('layouts.app')
@section('content')

<a href="{{route('projects.index')}}">Go back</a>
   <table>
       <tr>
           <td><strong>Project Name:</strong></td>
           <td>{{$project->project_name}}</td>
       </tr>
       <tr>
           <td><strong>Deadline:</strong></td>
           <td>{{$project->deadline}}</td>
       </tr>
       <tr>
           <td><strong>Tasks:</strong></td>
           <td>{{$project->task}}</td>
       </tr>

   </table>

<td><a href="{{ route('projects.edit', $project->id)}}" class="btn btn-primary">Edit</a></td>
<td><a href="{{ route('delete', $project->id)}}" class="btn btn-danger">Delete</a></td>

@endsection
