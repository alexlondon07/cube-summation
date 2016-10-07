@extends('layouts.app')

@section('content') 

        <div class="container">
            <div class="content">
                <div class="title">Cube Summation Result</div>
                <table class="table">
                	<tr>
                		<th>Results</th>
                    </tr>
               		@foreach ($results as $result)
                    <tr>
                    	<td>{{$result}}</td>
                    </tr>
               		@endforeach 
               </table>
            </div>
        </div>
@endsection
