<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Person;

class HelloTest extends TestCase
{
    // use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHello()
   {
    $this->assertTrue(true);

       $response = $this->get('/');
       $response->assertStatus(200);
      
       $response = $this->get('/hello');
       $response->assertStatus(302);
      
       $user = factory(User::class)->create();
       $response = $this->actingAs($user)->get('/hello');
       $response->assertStatus(200);

       $response = $this->get('/no_route');
       $response->assertStatus(404);
   }

}
