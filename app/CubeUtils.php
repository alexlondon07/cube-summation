<?php

namespace App;

use App\Cube;

use Exception;

class CubeUtils
{

   static function sum(Cube $cube, $x1, $y1, $z1, $x2, $y2, $z2){
        CubeUtils::validate_sum_range($cube, $x1, $y1, $z1, $x2, $y2, $z2);
        $sum = 0;
        for($x=$x1; $x<=$x2; $x++){
            for($y=$y1; $y<=$y2; $y++){
                for($z=$z1; $z<=$z2; $z++){
                    $sum += $cube->get_cell_value($x,$y,$z);
                }
            }   
        }
        return $sum;
   }

   static function print_cube(Cube $cube){
        echo 'N: '.$cube->get_size();
        echo ' | cube:'; 
        for ($x=1; $x < $cube->get_size(); $x++){ 
            for ($y=1; $y < $cube->get_size(); $y++){ 
                for ($z=1; $z < $cube->get_size(); $z++){
                    echo ' '.$cube->get_cell_value($x,$y,$z);
                }
            }
        }
    }

    private static function validate_sum_range(Cube $cube, $x1, $y1, $z1, $x2, $y2, $z2){
        if(CubeUtils::validate_coordinates_pair($cube, $x1, $x2) &&
            CubeUtils::validate_coordinates_pair($cube, $y1, $y2) &&
            CubeUtils::validate_coordinates_pair($cube, $z1, $z2)
        ) return;

        throw new Exception("Invalid Cube's Coordinate Value, every pair must be 1 <= value1 <= value2 <= N ", 1);

    }

    private static function validate_coordinates_pair(Cube $cube, $x1, $x2){
        return ($x1 <= $x2 && $x1 >= 0 && $x2 <= $cube->get_size());
    }
}
