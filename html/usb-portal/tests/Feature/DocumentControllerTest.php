<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

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

    public function testDownloadDocumentNotConnected()
    {
        $response = $this->get("/document/2");
        $response->assertStatus(302);
    }
}
