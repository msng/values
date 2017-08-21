<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleEnum;
use msng\Values\Tests\SampleClasses\SampleIntegerValue;
use PHPUnit\Framework\TestCase;

class ComparisonTest extends TestCase
{
    public function testIsMethod()
    {
        $enum = new SampleEnum(SampleEnum::DIAMOND);

        $this->assertTrue($enum->is(SampleEnum::DIAMOND));
        $this->assertFalse($enum->is(SampleEnum::SPADE));
    }

    public function testHasSameValueAsMethod()
    {
        $spade1 = new SampleEnum(SampleEnum::SPADE);
        $spade2 = new SampleIntegerValue(1);
        $heart = new SampleEnum(SampleEnum::HEART);

        $this->assertTrue($spade1->hasSameValueAs($spade2));
        $this->assertFalse($spade1->hasSameValueAs($heart));
    }

    public function testIsSameAsMethod()
    {
        $spade1 = new SampleEnum(SampleEnum::SPADE);
        $spade2 = new SampleIntegerValue(1);
        $spade3 = new SampleEnum(1);

        $this->assertFalse($spade1->isSameAs($spade2));
        $this->assertTrue($spade1->isSameAs($spade3));
    }

}
