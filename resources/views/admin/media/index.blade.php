@extends('layouts.admin')

@section('content')

    <h1>Medias page</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@mediaDelete', 'class'=>'form-inline']) !!}

        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="delete">Delete</option>
            </select>
        </div>

        <div class="form-group">

            <input type="submit" class="btn btn-primary">
            
        </div>


        @if($photos)

            <table class="table">

                <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>ID</th>
                    <th>File</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)

                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
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


    {!! Form::close() !!}



@stop


@section('scripts')

    <script>

        $(document).ready(function () {


            $("#options").click(function () {

                if(this.checked) {

                    $(".checkBoxes").each(function () {

                        this.checked = true;

                    });

                }else{

                    $(".checkBoxes").each(function () {

                        this.checked = false;

                    });

                }

            });


        });

    </script>


@stop




