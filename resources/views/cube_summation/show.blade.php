@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="content">
                <div class="title">Cube Summation Input</div>
                {!! Form::open(array('url' => 'cube_summation', 'method' => 'POST')) !!}
                <div class="class-md-12 field">
                    {!! Form::label('input_file','Attach input file') !!}
                    {!! Form::file('input_file') !!}
                </div>
                <div class="class-md-12 field">
                    {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

@endsection