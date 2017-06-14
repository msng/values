<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleEnum;
use PHPUnit\Framework\TestCase;

class EnumValueTest extends TestCase
{
    public function testCorrectArgument()
    {
        $enum = new SampleEnum(SampleEnum::SPADE);

        $this->assertSame(SampleEnum::SPADE, $enum->get());
    }

    public function testIncorrectArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        new SampleEnum(5);
    }

}