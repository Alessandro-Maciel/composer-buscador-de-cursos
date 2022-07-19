<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ValueTest extends TestCase
{
    public function testValue(): void
    {
        $value = true;

        $this->assertTrue($value);
    }
}
