@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

    @endif

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>User</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50px" src="{{$post->photo? $post->photo->file : "#"}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{str_limit($post->body, 30)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach

        @endif


        </tbody>
    </table>

@stop