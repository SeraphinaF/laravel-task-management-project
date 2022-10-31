@extends('layouts.app')
@section('content')

<a href="{{route('projects.index')}}">Go back</a>
   <table>
       <tr>
           <td><strong>Project Name:</strong></td>
           <td>{{$project->project_name}}</td>
       </tr>
{{--       <tr>--}}
{{--           <td><strong>Category:</strong></td>--}}
{{--           <td>{{$categories->name}}</td>--}}
{{--       </tr>--}}
       <tr>
           <td><strong>Deadline:</strong></td>
           <td>{{$project->deadline}}</td>
       </tr>
       <tr>
           <td><strong>Tasks:</strong></td>
           <td>{{$project->task}}</td>
       </tr>

   </table>

<td><a href="{{ route('edit', ['id'=>$project['id']])}}">Edit</a></td>
<td><a href="{{ route('delete', ['id'=> $project['id']])}}">Delete</a></td>

   @endsection
