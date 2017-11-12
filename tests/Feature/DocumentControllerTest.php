<?php

namespace Tests\Feature;

use App\Http\Controllers\DocumentController;
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

    public function test_downloadDocumentNotConnected()
    {
        $response = $this->get("/document/2");
        $response->assertStatus(302);
    }

    // TODO : function test download
//    public function test_GetConnected()
//    {
//        $response = $this->actingAs($this->user)->get("/document/" . $this->document->id);
//        $response->assertStatus(200);
//    }
}
