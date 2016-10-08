<?php

namespace App;

use Exception;

class Cube
{
    private $n;
    private $cube;

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
        $this->validate_params($x,$y,$z,$w);
        $this->cube[$x-1][$y-1][$z-1] = $w;
        return $w;
    }

    function get_cell_value($x, $y, $z){
        $this->validate_params($x,$y,$z);
        return $this->cube[$x-1][$y-1][$z-1];
    }

    private function validate_params($x,$y,$z,$w=0){
        return (
            $this->validate_range($x,1,$this->n) && 
            $this->validate_range($y,1,$this->n) && 
            $this->validate_range($z,1,$this->n) &&
            $this->validate_range($w,-1000000000,1000000000)
        );
    }

    private function validate_range($value,$min,$max){
        if  (($value >= $min) && ($value <= $max))
            return true;

        throw new Exception("Invalid cube's value: ".$value.", must be between ".$min." and ".$max, 1);
    }
}
