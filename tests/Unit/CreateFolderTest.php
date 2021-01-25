<?php

namespace Tests\Unit;

use App\Folder;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class CreateFolderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed('DatabaseSeeder');
    }

    /**
     * @test
     */
    public function testCreate()
    {
        $folders = factory(Folder::class, 3)->create();

        var_dump($folders);

        $count = count($folders);
        $this->assertEquals(3, $count);
    }
}
