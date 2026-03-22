<?php

namespace Tests\Zataca\Utils;

use PHPUnit\Framework\TestCase as FrameworkTestCase;

class TestCase extends FrameworkTestCase
{
    protected function assertStringEncryption(string $encryptedString): void
    {
        $preffix = 'ZA';
        $suffix = 'CK';
        $this->assertStringStartsWith($preffix, $encryptedString);
        $this->assertStringEndsWith($suffix, $encryptedString);
    }
}