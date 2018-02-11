@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img height="80px" src="{{$post->photo ? $post->photo->file : "https://placehold.it/300X300"}}" alt="">

    <hr>

    <!-- Post Content -->

    <p>{!! $post->body   !!}</p>

    <hr>

    <!-- Blog Comments -->

    @if(Session::has('comment_message'))

        <p>{{session('comment_message')}}</p>

    @endif

    @if(Auth::check())


        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>

            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=>3]) !!}

            {!! Form::submit('Submit', ['class'=>'btn btn-primary', 'style'=>'margin-top: 10px;']) !!}

            {!! Form::close() !!}
        </div>


    @endif

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if(count($comments) > 0)

        @foreach($comments as $comment)

            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" width="64" class="media-object" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/64x64'}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}
                <!-- Nested Comment -->
                   @if(count($comment->commentReplies) > 0)

                       @foreach($comment->commentReplies as $replies)

                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img height="64" width="64" class="media-object" src="{{$replies->photo ? $replies->photo : 'http://placehold.it/64x64'}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$replies->author}}
                                        <small>{{$replies->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$replies->body}}
                                </div>
                            </div>

                        @endforeach

                    @endif

                   <div class="comment-reply-container">

                       <button class="toggle-reply btn btn-primary pull-right">reply</button>

                       <div class="comment-reply">
                           {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@commentReply']) !!}

                           <input type="hidden" name="comment_id" value="{{$comment->id}}">

                           {!! Form::label('body', 'Reply') !!}
                           {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=>1]) !!}

                           {!! Form::submit('Submit', ['class'=>'btn btn-primary', 'style'=>'margin-top: 10px;']) !!}

                           {!! Form::close() !!}
                       </div>

                   </div>


                    <!-- End Nested Comment -->
                </div>
            </div>

        @endforeach


    @endif


@stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {

            $(this).next().slideToggle("slow");

        });

    </script>


@stop
