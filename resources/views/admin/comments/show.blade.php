@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>

    @if($comments)

        <table class="table">

            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>On Title</th>
                <th>Comment</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)

                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->post->title}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->slug)}}">view post</a></td>
                    <td>

                        @if($comment->is_active==1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            {!! Form::submit('Unapprove', ['class'=>'btn btn-info']) !!}

                            {!! Form::close() !!}


                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>

            @endforeach
            </tbody>

        </table>


    @else
        <h3 class="text-center">No Comments</h3>


    @endif




@stop