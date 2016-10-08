<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Cube;
use App\CubeUtils;

use Exception;

class CubeUtilsTest extends TestCase
{
    
    public function testValidSum(){
     	$cube = new Cube(4);

        $cube->set_cell_value(2,2,2,4);
        $this->assertEquals(4,CubeUtils::sum($cube,1,1,1,3,3,3));
        
        $cube->set_cell_value(1,1,1,23);
        $this->assertEquals(4,CubeUtils::sum($cube,2,2,2,4,4,4));
        $this->assertEquals(27,CubeUtils::sum($cube,1,1,1,3,3,3));
    }

    /**
     * @expectedException Exception
     */
    public function testSumInvalidRange(){
     	$cube = new Cube(2);
        CubeUtils::sum($cube,1,1,1,3,3,3);	
    }
}
