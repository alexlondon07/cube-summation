<?php

namespace App;

use Exception;
use File;

class CubeSummationInputReader
{
    static function read($file){

    	$content = File::get($file->getRealPath());
    	$lines = explode("\n",$content);
    	$tests = [];
    	$t = $lines[0];

    	for ($i=0, $line=1; $i < $t; $i++) {
    		try {
	    		$n_m_line = explode(" ",$lines[$line++]);
				$n = $n_m_line[0];
				$m = $n_m_line[1];
				$cube_operations = [];
			} catch (Exception $e) {
    			 	throw new Exception("Bad Input file, you are trying to execute more tests than defined in the variable T ", 1);
    		} 

    		for ($j=0; $j < $m; $j++) {
    			
    			 	$params = explode(" ",$lines[$line+$j]);
	    			//echo $lines[$line+$i]."<br>";
					$cube_op = CubeOperationFactory::get_cube_operation($params);
					$cube_operations[] = $cube_op;
    			
    			
    		}

    		$tests[] = new CubeSummationTest($n,$cube_operations); 
			$line += $m;
    	}

		return $tests;
    }
}
