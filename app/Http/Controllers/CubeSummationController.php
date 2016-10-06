<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CubeSummationController extends Controller
{
    //Controller to handle cube summation requests

	/**
	* Handles cube summation request using a file as resource.
	*
	* @param  Request  $request
	* @return Response
	*/
    public function cubeSummationFromFile(Request $request)
    {

        return view('cube_summation.result', ['result' => "mock result"]);
    }  

	/**
	* Handles cube summation request using a file as resource.
	*
	* @param  Request  $request
	* @return Response
	*/
    public function showCubeSummation(Request $request)
    {

        return view('cube_summation.show');
    }
}
