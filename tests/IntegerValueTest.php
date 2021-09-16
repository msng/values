<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleIntegerValue;
use msng\Values\Tests\SampleClasses\SampleIntegerValueWithRange;
use msng\Values\Tests\SampleClasses\SampleLooseIntegerValue;
use msng\Values\Tests\SampleClasses\SampleStrictIntegerValue;
use PHPUnit\Framework\TestCase;

class IntegerValueTest extends TestCase
{
    public function testNormalInteger()
    {
        $value = 123;
        $integerValue = new SampleIntegerValue($value);

        $this->assertSame($value, $integerValue->getValue());
    }

    public function testNormalIntegerWithStrictMode()
    {
        $value = 123;
        $integerValue = new SampleStrictIntegerValue($value);

        $this->assertSame($value, $integerValue->getValue());
    }

    public function testNegativeInteger()
    {
        $value = -99;
        $integerValue = new SampleIntegerValue($value);

        $this->assertSame($value, $integerValue->getValue());

    }

    public function testStringWithLooseMode()
    {
        $value = '123';
        $integerValue = new SampleLooseIntegerValue($value);

        $this->assertEquals($value, $integerValue->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testStringWithStrictMode()
    {
        $value = '123';
        new SampleStrictIntegerValue($value);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNonIntegerString()
    {
        $value = '123abc';

        new SampleIntegerValue($value);
    }

    public function testRange()
    {
        $values = [1, 50, 100];

        foreach ($values as $value) {
            $integerValue = new SampleIntegerValueWithRange($value);
            $this->assertSame($value, $integerValue->getValue());
        }
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testUnderMin()
    {
        $value = 0;

        new SampleIntegerValueWithRange($value);
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testOverMax()
    {
        $value = 101;

        new SampleIntegerValueWithRange($value);
    }

}
