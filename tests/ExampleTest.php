<?php

namespace DenitsaMd\LaravelProgressStatusBroadcast\Tests;

use DenitsaMd\ProgressStatusBroadcast\ProgressStatusBroadcastServiceProvider;
use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ProgressStatusBroadcastServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
