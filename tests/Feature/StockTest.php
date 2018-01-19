<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Stock;

class StockTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->assertTrue(true);
        $stock = new Stock(['name' => 'Tesla', 'price' => 10]);
      
        //checking the above values are setting correctly
        $this->assertEquals('Tesla', $stock->name);
        $this->assertEquals(10, $stock->price);

    }
}
