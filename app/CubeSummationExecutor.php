<?php

namespace App;

use App\Cube;
use App\CubeUtils;
use App\QueryCubeOperation;

use Exception;
use File;

class CubeSummationExecutor
{

	static function execute_tests($cube_operations){

		$results = [];

    	foreach ($cube_operations as $cube_op) {

    		$cube = new Cube($cube_op->get_cube_size());

    		foreach ($cube_op->get_cube_operations() as $ops) {

    			$result = $ops->execute($cube);
    			if($ops instanceof QueryCubeOperation){
    				$results[] = $result;
    			}
    		}
    	}

		return $results;
    }
}
