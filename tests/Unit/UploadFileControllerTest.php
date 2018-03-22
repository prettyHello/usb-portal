<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Document;
use App\User;
use Illuminate\Support\Facades\Storage;

class UploadFileControllerTest extends TestCase
{
    private $document;
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

    public function testStartUploadFileConnected()
    {
        Storage::fake('storage/app/uploads');

        $response = $this->actingAs($this->user)->post(
            '/uploadfile',
            ['doc' => Document::fake()->create('test2.pdf', 50)]
        );

        $this->assertRegexp('/test2.pdf/', $response->getContent());
    }
}
