<?php

namespace App;

use Exception;
use File;
use App\CubeSummationInputReader as CIR;

class CubeSummationInputReader
{
    static function read($file){

    	$content = File::get($file->getRealPath());
    	$lines = explode("\n",$content);
    	$tests = [];
    	$t = $lines[0];
    	CIR::validate_input($t,1,100);
    	for ($i=0, $line=1; $i < $t; $i++) {
    		try {
	    		$n_m_line = explode(" ",$lines[$line++]);
				$n = CIR::validate_input($n_m_line[0],1,100);
				$m = CIR::validate_input($n_m_line[1],1,1000);
				$cube_operations = [];
			} catch (Exception $e) {
    			 	throw new Exception("Bad Input file, you are trying to execute more tests than defined in the variable T ", 1);
    		} 

    		for ($j=0; $j < $m; $j++) {
    			
    			 	$params = explode(" ",$lines[$line+$j]);
					$cube_op = CubeOperationFactory::get_cube_operation($params);
					$cube_operations[] = $cube_op;	
    		}

    		$tests[] = new CubeSummationTest($n,$cube_operations); 
			$line += $m;
    	}

		return $tests;
    }

    private static function validate_input($value, $min, $max){
    	if ($value >= $min && $value <=$max)
    			return $value;
    	throw new Exception("Bad Input file, you are trying to use an invalid value ".$value, 1);
    	
    }	
}
