<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Document;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UploadFileControllerTest extends TestCase
{
    private $document;
    private $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->document = factory(Document::class)->create();
    }

    protected function tearDown()
    {
        $this->document->delete();
        $this->user->delete();
        parent::tearDown();
    }

    public function testStartUploadFileNotConnected()
    {
        Storage::fake('uploads');

        $response = $this->actingAs($this->user)->json(
            'POST',
            '/uploadfile',
            ['avatar' => Document::fake()->create('test.pdf', 50)]
        );

        Storage::disk('uploads')->assertMissing('test.pdf');
    }

    public function testStartUploadFileConnected()
    {
        Storage::fake('uploads');

        $response = $this->actingAs($this->user)->json(
            'POST',
            '/uploadfile',
            ['avatar' => Document::fake()->create('test.pdf', 50)]
        );

        Storage::disk('uploads')->assertExists('test.pdf');
    }
}
