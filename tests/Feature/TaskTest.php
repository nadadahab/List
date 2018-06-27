<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testget()
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

     public function testgetAll()
    {
        $response = $this->json('GET','/api/tasks');

        $response ->assertStatus(200);
            
    }

     public function testpost()
    {
        $response = $this->json('POST', '/api/tasks', ['name' => 'task1']);

        $response ->assertStatus(200);
        $response ->assertJson([
                'task' => true,
            ]);

    }

    public function testdelete()
    {
    	//please change the id everytime you run the test
        $response = $this->json('Delete','/api/tasks/delete/5b33f37865c96140181f5075');

        $response ->assertStatus(200);
         $response ->assertExactJson([
                'deleted' => 'done',
            ]);
       
    }


   
}

