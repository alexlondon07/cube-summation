<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CubeSummationFromFileRequest;
use App\Cube;
use App\CubeUtils;

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

    	//$file = $request->file('input_file');

    	$cube = new Cube(4);
    	$results = [];

    	//insert an input reader
    	//insert a cube summator

    	//write unit tests
    	// CubeUtils::print_cube($cube);

    	// $cube->set_cell_value(2,2,2,4);
    	// array_push($results,CubeUtils::sum($cube,1,1,1,3,3,3));
    	// $cube->set_cell_value(1,1,1,23);

    	// array_push($results,CubeUtils::sum($cube,2,2,2,4,4,4));
    	// array_push($results,CubeUtils::sum($cube,1,1,1,3,3,3));

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
