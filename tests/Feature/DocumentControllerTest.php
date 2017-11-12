<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class DocumentControllerTest extends TestCase
{
    private $user;
//    private $document;

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

    public function downloadDocumentNotConnected()
    {
        $response = $this->downloadDocument("/document/2");
        $response->assertStatus(302);
    }

    // TODO : function test download
//    public function testGetConnected()
//    {
//        $response = $this->actingAs($this->user)->get("/document/" . $this->document->id);
//        $response->assertStatus(200);
//    }
}
