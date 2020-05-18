<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SpotifyRecomTest extends TestCase{
    //This test satisfies two paths
    public function testGetRandSeeds(){
        $obj= new SpotifyRecom();
        $seeds = $obj->getRandSeeds(3);
        $expected_array = array(1,1,1);
        $this->assertEquals($seeds, $expected_array);
    }
}