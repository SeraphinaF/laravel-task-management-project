@extends('layouts.app')
@section('content')


   <table>
       <tr>
           <td>Project_name</td>
       </tr>
       <tr>
           <td>Deadline</td>
       </tr>
       <tr>
           <td>Tasks</td>
       </tr>


       <tr>
           <td>{{$project->project_name}}</td>
       </tr>
       <tr>
           <td>{{$project->deadline}}</td>
       </tr>
       <tr>
           <td>{{$project->task}}</td>
       </tr>
   </table>

   @endsection
