<?php

namespace App;

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
        $this->cube[$x-1][$y-1][$z-1] = $w;
    }

    function get_cell_value($x, $y, $z){
        return $this->cube[$x-1][$y-1][$z-1];
    }   
}
