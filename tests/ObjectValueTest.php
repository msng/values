<?php

namespace msng\Values\Tests;

use InvalidArgumentException;
use msng\Values\Tests\SampleClasses\SampleObjectValue;
use PHPUnit\Framework\TestCase;

class ObjectValueTest extends TestCase
{
    public function testWrongType()
    {
        $this->expectException(InvalidArgumentException::class);
        new SampleObjectValue(0);
    }

}
