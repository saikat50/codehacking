@extends('layouts.admin')

@section('content')

    <h1>Edit category</h1>

    <div class="col-sm-6">
        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            {!! Form::submit('Update', ['class'=>'btn btn-primary', 'style'=>'margin-top:20px']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

            {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'styel'=>'margin-top:10px']) !!}

        {!! Form::close() !!}


    </div>

@stop