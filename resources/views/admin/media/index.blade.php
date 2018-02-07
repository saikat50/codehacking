@extends('layouts.admin')

@section('content')

    <h1>Medias page</h1>

    @if($photos)

        <table class="table">

            <thead>
            <tr>
                <th>ID</th>
                <th>File</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)

                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50px;" src="{{$photo ? $photo->file : "#"}}" alt=""></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}

                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>

            @endforeach
            </tbody>

        </table>

    @endif



@stop