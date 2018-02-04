@extends('layouts.admin')

@section('content')


    <h1>Edit User</h1>


    <div class="row">

        <div class="col-xs-3">
            <img class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->file : "#"}}" alt="">
        </div>

        <div class="col-xs-9">
            {!! Form::model($user, ['method'=>'PATCH', 'action'=>["AdminUsersController@update", $user->id], 'files'=>true]) !!}

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
                {!! Form::select('is_actve', array(1=>'Active', 0=>'Not Active' ), $status, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-grouo">
                {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
            </div>


            {!! Form::close() !!}
        </div>

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>




@stop



