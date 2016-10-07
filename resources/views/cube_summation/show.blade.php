@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="content">
                <h2>Cube Summation From a txt File Input</h2>
                 @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="col-md-12">

                    <div class="col-md-6">  
                        {!! Form::open(['url' => 'cube_summation', 'method' => 'POST', 'files' => true]) !!} 
                            <div class="col-md-12 field">
                                {!! Form::label('input_file','Attach the input file') !!}
                                {!! Form::file('input_file') !!}
                            </div>
                            <div class="col-md-12 field">
                                {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                   
                    <div class="col-md-6 field">
                        <h3>Instructions:</h3>
                        <p>
                            <ol>
                            <li>
                                Please upload a .txt file with the input format which is explained in the challenge's page <a href="https://www.hackerrank.com/challenges/cube-summation">hackerrank.com</a>
                            </li>
                            <li>
                                Submit to see the results!
                            </li>
                           </ol>
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>

@endsection