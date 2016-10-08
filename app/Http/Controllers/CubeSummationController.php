<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CubeSummationFromFileRequest;
use App\Cube;
use App\CubeUtils;
use File;

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

    	$file = $request->file('input_file');
    	$content = File::get($file->getRealPath());
    	$lines = explode("\n",$content);
    	$results = [];

    	echo "Total de lineas: ".count($lines)."<br>";

    	$t = $lines[0];
    		
    	for($index = 1; $index < count($lines)-1; $index++ ) {

	    	$n_m_line = explode(" ",$lines[$index]);
			$n = $n_m_line[0];
			$m = $n_m_line[1];
			echo $lines[$index]."<br>";
			$cube = new Cube($n);

			for($i=1; $i<=$m; $i++){
			
				$op = explode(" ",$lines[$index+$i]);
				echo $lines[$index+$i]."<br>";

				if($op[0] === "UPDATE") {
					if(count($op) < 5){
						throw new Exception("Bad Input Exception, check error in line ".($index+$i).".", 1);
					}
					
					$cube->set_cell_value($op[1],$op[2],$op[3],$op[4]);
				}
				else if($op[0] === "QUERY") {
					if(count($op) < 7){
						throw new Exception("Bad Input Exception, check error in line ".($index+$i).".", 1);
					}
			
					array_push($results, CubeUtils::sum($cube,$op[1],$op[2],$op[3],$op[4],$op[5],$op[6]));
				}
			}

			$index += $m;
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
