@extends('layouts.app')

@section('content')
    <h1>Welcome Admin</h1>
    <div>
        <h4>There are currently {{ \App\Models\User::count() }} users.</h4>
        <table>
            <tr>
                <td><strong>User</strong></td>
                <td><strong>Email</strong></td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td><a href="{{ route('admin.deleteUser', $user->id) }}" class="btn btn-danger">Remove</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
