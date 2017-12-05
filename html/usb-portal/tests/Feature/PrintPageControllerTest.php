<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class PrintPageControllerTest extends TestCase
{
    private $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    protected function tearDown()
    {
        $this->user->delete();
        parent::tearDown();
    }

    public function testGetNotConnected()
    {
        $response = $this->get("/print");
        $response->assertRedirect("/login");
    }

    public function testGetConnected()
    {
        $response = $this->actingAs($this->user)->get("/print");
        $response->assertStatus(200);
    }
}
