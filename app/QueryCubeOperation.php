<?php

namespace App;

use App\Cube;
use App\CubeUtils;

class QueryCubeOperation implements CubeOperation
{

	private $x1;
	private $x2;
	private $y1;
	private $y2;
	private $z1;
	private $z2;

	function __construct($x1,$y1,$z1,$x2,$y2,$z2){
    	$this->x1 = $x1;
    	$this->x2 = $x2;
    	$this->y1 = $y1;
    	$this->y2 = $y2;
    	$this->z1 = $z1;
    	$this->z2 = $z2; 
    }

	function execute(Cube $cube){
		return CubeUtils::sum($cube,$this->x1,$this->y1,$this->z1,$this->x2,$this->y2,$this->z2);
	}
}
