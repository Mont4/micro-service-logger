<?php

namespace Mont4\MicroServiceLogger\Tests;

use Mont4\MicroServiceLogger\Facades\MicroServiceLogger;
use Mont4\MicroServiceLogger\ServiceProvider;
use Orchestra\Testbench\TestCase;

class MicroServiceLoggerTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'MicroServiceLogger' => MicroServiceLogger::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
