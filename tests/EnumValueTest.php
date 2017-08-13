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

    public function testGetValues()
    {
        $this->assertSame([
            'SPADE' => 1,
            'HEART' => 2,
            'DIAMOND' => 3,
            'CLUB' => 4
        ], SampleEnum::getValues());
    }

    public function testIsMethod()
    {
        $enum = new SampleEnum(SampleEnum::DIAMOND);

        $this->assertTrue($enum->is(SampleEnum::DIAMOND));
        $this->assertFalse($enum->is(SampleEnum::SPADE));
    }

    public function testIncorrectArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        new SampleEnum(5);
    }

}
