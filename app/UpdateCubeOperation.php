<?php

namespace App;

use App\Cube;

class UpdateCubeOperation implements CubeOperation
{

	private $x;
	private $y;
	private $z;
	private $w;

	function __construct($x,$y,$z,$w){
    	$this->x = $x;
    	$this->y = $y;
    	$this->z = $z;
    	$this->w = $w;
    }

	function execute(Cube $cube){
		return $cube->set_cell_value($this->x,$this->y,$this->z,$this->w);
	}
}
