<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Cube;

use Exception;

class CubeTest extends TestCase
{
    
    public function testInitializeSizelessCube(){
     	$cube = new Cube;
     	$this->assertEquals(1, $cube->get_size() );
     	
    }

    public function testInitialize2NSizeCube(){
     	$cube = new Cube(2);
     	$this->assertEquals(2, $cube->get_size() );
    }

    public function testCubeInitializedWithZeros(){
     	$cube = new Cube(2);
     	$this->assertEquals(0, $cube->get_cell_value(1,1,1));
    }

    public function testSetInRangeCellValue(){
     	$cube = new Cube(2);
     	$cube->set_cell_value(2,2,2,4);
     	$this->assertEquals(4, $cube->get_cell_value(2,2,2));
    }

    /**
     * @expectedException Exception
     */
    public function testSetOutOfRangeCellValue(){
     	$cube = new Cube(2);
     	$cube->set_cell_value(4,4,4,4);
     	
    }

    /**
     * @expectedException Exception
     */
    public function testGetOutOfRangeCellValue(){
     	$cube = new Cube(2);
     	$cube->get_cell_value(4,4,4);
    }
    
}
