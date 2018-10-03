<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleEnum;
use msng\Values\Tests\SampleClasses\SampleEnumUnderscore;
use PHPUnit\Framework\TestCase;

class EnumValueTest extends TestCase
{
    public function testCorrectArgument()
    {
        $enum = new SampleEnum(SampleEnum::SPADE);

        $this->assertSame(SampleEnum::SPADE, $enum->getValue());
    }

    public function testLabel()
    {
        $enum = new SampleEnum(SampleEnum::HEART);

        $this->assertSame('Heart', $enum->getLabel());
    }

    public function testVoidLabel()
    {
        $enum = new SampleEnum(SampleEnum::CLUB);

        $this->assertNull($enum->getLabel());
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

    public function testIncorrectArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        new SampleEnum(5);
    }

    public function testGetLabelFor()
    {
        $label = SampleEnum::getLabelFor(SampleEnum::DIAMOND);

        $this->assertSame('Diamond', $label);
    }

    public function testStaticNew()
    {
        $spade = new SampleEnum(SampleEnum::SPADE);
        $diamond = new SampleEnum(SampleEnum::DIAMOND);

        $spadeStaticNew = SampleEnum::SPADE();

        $this->assertTrue($spadeStaticNew->isSameAs($spade));
        $this->assertFalse($spadeStaticNew->isSameAs($diamond));
    }

    public function testIs()
    {
        $heart = SampleEnum::HEART();

        $this->assertTrue($heart->isHEART());
        $this->assertFalse($heart->isSPADE());
    }

    public function testIsAlias()
    {
        $firstValue = new SampleEnumUnderscore(SampleEnumUnderscore::FIRST_VALUE);

        $this->assertTrue($firstValue->isFirstValue());
        $this->assertFalse($firstValue->isSecondValue());
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testIsUndefined()
    {
        $diamond = SampleEnum::DIAMOND();

        /** @noinspection PhpUndefinedMethodInspection */
        $diamond->isRUBY();
    }

}
