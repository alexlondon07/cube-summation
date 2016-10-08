<?php

namespace App;

use App\Cube;
use App\CubeUtils;

class CubeSummationTest{

	private $n;
	private $cube_operations;

	function __construct($n,$operations){
		if($n<0){ $this->n = 0; }
    	$this->n = $n;
    	$this->cube_operations = $operations;
    }

	function get_cube_size(){
		return $this->n;
	}

	function get_cube_operations(){
		return $this->cube_operations;
	}
}
