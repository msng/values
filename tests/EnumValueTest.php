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

    public function testLabel()
    {
        $enum = new SampleEnum(SampleEnum::HEART);

        $this->assertSame('Heart', $enum->label());
    }

    public function testVoidLabel()
    {
        $enum = new SampleEnum(SampleEnum::CLUB);

        $this->assertNull($enum->label());
    }

    public function testIncorrectArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        new SampleEnum(5);
    }

}