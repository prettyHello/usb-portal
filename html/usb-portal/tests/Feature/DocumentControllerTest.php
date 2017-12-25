<?php

namespace Tests\Feature;

use App\Http\Controllers\DocumentController;
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

//    public function testDownloadDocumentConnected()
//    {
//        $response = $this->actingAs($this->user)->get("/document/" . $this->document->id);
//        $response->assertStatus(200);
//    }

//    public function testShowDocumentConnected(Document $document)
//    {
//
//    }

//    public function testShowDocumentNotConnected(Document $document)
//    {
//
//    }

    // TODO : faire des mocks pour être sûr que ça passe sur Travis
    public static function testGetAllDocuments()
    {
        $documents = DocumentController::getAllDocuments();
        $size = sizeof($documents);
        self::assertTrue($size > 0);
    }
}
