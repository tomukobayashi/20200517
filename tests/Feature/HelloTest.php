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
     // ダミーで利用するデータ
     factory(User::class)->create([
        'name' => 'AAA',
        'email' => 'BBB@CCC.COM',
        'password' => 'ABCABC',
    ]);
    factory(User::class, 10)->create();

    $this->assertDatabaseHas('users', [
        'name' => 'AAA',
        'email' => 'BBB@CCC.COM',
        'password' => 'ABCABC',
    ]);

    // ダミーで利用するデータ
    factory(Person::class)->create([
        'name' => 'XXX',
        'mail' => 'YYY@ZZZ.COM',
        'age' => 123,
    ]);
    factory(Person::class, 10)->create();

    $this->assertDatabaseHas('people', [
        'name' => 'XXX',
        'mail' => 'YYY@ZZZ.COM',
        'age' => 123,
    ]);
   }

}
