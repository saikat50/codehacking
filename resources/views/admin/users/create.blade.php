@extends('layouts.admin')

@section('content')


    <h1>create page</h1>

    {!! Form::open(['method'=>'Post', 'action'=>"AdminUsersController@store", 'files'=>true]) !!}

       <div class="form-group">
           {!! Form::label('name', 'Name') !!}
           {!! Form::text('name', null, ['class'=>'form-control']) !!}
       </div>

        <div class="form-group">
            {!! Form::label('email', 'Eamil') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
           {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
         </div>

        <div class="form-group">
            {!! Form::label('is_actve', 'status') !!}
            {!! Form::select('is_actve', array(1=>'Active', 0=>'Not Active' ), 0, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', [''=>'choose options']+$roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-grouo">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>


    {!! Form::close() !!}


    @include('includes.form_error')




    @stop



