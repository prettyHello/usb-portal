<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UploadFileControllerTest extends TestCase
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
        $response = $this->get("/uploadfile");
        $response->assertRedirect("/login");
    }

    public function testGetConnected()
    {
        $response = $this->actingAs($this->user)->get("/uploadfile");
        $response->assertStatus(200);
    }

    public function testGetConnectedIndex()
    {
        $response = $this->actingAs($this->user)->get("/print");
        $response->assertStatus(200);
    }

    public function testGetNotConnectedIndex()
    {
        $response = $this->get("/print");
        $response->assertRedirect("/login");
    }
}
