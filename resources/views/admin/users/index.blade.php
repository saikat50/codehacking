@extends('layouts.admin')

@section('content')

    <h1>users</h1>

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

    @endif

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50px" src="{{$user->photo? $user->photo->file : "#"}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->is_actve == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach

        @endif


        </tbody>
    </table>

    @stop