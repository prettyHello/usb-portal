<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class ActionPageControllerTest extends TestCase
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

    public function test_GetNotConnected()
    {
        $response = $this->get("/action");
        $response->assertRedirect("/login");
    }

    public function test_GetConnected()
    {
        $response = $this->actingAs($this->user)->get("/action");
        $response->assertStatus(200);
    }
}
