<?php

namespace App;

use Exception;

class Cube
{
    private $n;
    private $cube;

    //TODO validators

    function __construct($n_=1){
        $this->n = $n_;
        $this->initialize_cube();
    }

    function get_size(){
        return $this->n;
    }

    function initialize_cube(){
        for ($x=0; $x < $this->n; $x++){ 
            for ($y=0; $y < $this->n; $y++){ 
                for ($z=0; $z < $this->n; $z++){ 
                    $this->cube[$x][$y][$z]=0;
                }
            }
        }
    }

    function set_cell_value($x, $y, $z, $w){
        $this->validate_coordinate($x,$y,$z);
        $this->cube[$x-1][$y-1][$z-1] = $w;
    }

    function get_cell_value($x, $y, $z){
        $this->validate_coordinate($x,$y,$z);
        return $this->cube[$x-1][$y-1][$z-1];
    }

    function validate_coordinate($x,$y,$z){
        if ($this->validate_range($x) && $this->validate_range($y) && $this->validate_range($z))
            return;
        throw new Exception("Invalid Cube Coordinate Value, must be 0 >= value <= N", 1);
        
    }

    function validate_range($coordinate){
        return  (($coordinate >= 0) && ($coordinate <= $this->n));
    }
}
