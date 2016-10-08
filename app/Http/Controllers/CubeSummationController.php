<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redirect;
use Exception;

use App\Http\Requests\CubeSummationFromFileRequest;
use App\CubeSummationExecutor;
use App\CubeSummationInputReader;

class CubeSummationController extends Controller
{
    //Controller to handle cube summation requests

	/**
	* Handles cube summation request using a file as resource.
	*
	* @param  Request  $request
	* @return Response
	*/
    public function cubeSummationFromFile(CubeSummationFromFileRequest $request)
    {
    	try {

    		$file = $request->file('input_file');
    		$cube_summation_tests = CubeSummationInputReader::read($file);
    		$results = CubeSummationExecutor::execute_tests($cube_summation_tests);
    	
    	} catch (Exception $e) {

    		return Redirect::back()->withErrors($e->getMessage()); 
    	}
    	
        return view('cube_summation.result', ['results' => $results]);
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
