<?php

namespace App;

use App\Cube;
use App\UpdateCubeOperation;
use App\QueryCubeOperation;

use Exception;

class CubeOperationFactory
{
   public static function get_cube_operation($params){

		if($params[0] === "UPDATE"){
			if(count($params) == 5){
				return new UpdateCubeOperation($params[1],$params[2],$params[3],$params[4]);
			}
		} else if($params[0] === "QUERY"){
			if(count($params) == 7){
				return new QueryCubeOperation(
               $params[1], $params[2],$params[3],
               $params[4],$params[5],$params[6]
            );
			}
		}
      
      throw new Exception("Bad Parameters, the Cube Operation could not be created", 1);	
   }

}
