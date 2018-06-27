<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testDatabase()
	{
        //please sure task1 is exist
		  $this->assertDatabaseHas('tasks_collection', [
		     'name' => 'task1'
		]);
	}
}
