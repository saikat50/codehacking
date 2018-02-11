@extends('layouts.admin')

@section('content')

    <h1>Replies</h1>

    @if($comment)

        <table class="table">

            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>On Title</th>
                <th>Replies</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comment->commentReplies as $reply)

                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->comment->post->title}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->slug)}}">view post</a></td>
                    <td>

                        @if($reply->is_active==1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            {!! Form::submit('Unapprove', ['class'=>'btn btn-info']) !!}

                            {!! Form::close() !!}


                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}

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