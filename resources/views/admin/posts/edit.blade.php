@extends('layouts.admin')

@section('content')


    <h1>Posts Edit</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', [''=>'choose options']+$categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Description:') !!}
        {!! Form::textarea('body', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('update',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

    {!! Form::close() !!}


@stop
