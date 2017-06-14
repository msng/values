<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleIntegerValue;
use PHPUnit\Framework\TestCase;

class IntegerValueTest extends TestCase
{
    public function testNormalInteger()
    {
        $value = 123;
        $integerValue = new SampleIntegerValue($value);

        $this->assertSame($value, $integerValue->get());
    }

    public function testNormalIntegerWithStrictMode()
    {
        $value = 123;
        $integerValue = new SampleIntegerValue($value, SampleIntegerValue::TYPE_CHECK_STRICT);

        $this->assertSame($value, $integerValue->get());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWrongTypeCheckMode()
    {
        $value = 123;

        new SampleIntegerValue($value, 'wrongValue');
    }

    public function testNegativeInteger()
    {
        $value = -99;
        $integerValue = new SampleIntegerValue($value);

        $this->assertSame($value, $integerValue->get());

    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWrongDefaultTypeCheckMode()
    {
        SampleIntegerValue::setDefaultTypeCheckMode(999);
    }

    public function testStringWithDefaultLooseMode()
    {
        SampleIntegerValue::setDefaultTypeCheckMode(SampleIntegerValue::TYPE_CHECK_LOOSE);

        $value = '123';
        $integerValue = new SampleIntegerValue($value);

        $this->assertEquals($value, $integerValue->get());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testStringWithDefaultStrictMode()
    {
        SampleIntegerValue::setDefaultTypeCheckMode(true);

        $value = '123';
        new SampleIntegerValue($value);
    }

    public function testStringWithDefaultMode()
    {
        $value = '123';
        $integerValue = new SampleIntegerValue($value);

        $this->assertEquals($value, $integerValue->get());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testStringWithStrictMode()
    {
        $value = '123';

        new SampleIntegerValue($value, true);
    }

    public function testStringWithLooseMode()
    {
        $value = '123';
        $integerValue = new SampleIntegerValue($value, false);

        $this->assertEquals($value, $integerValue->get());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNonIntegerString()
    {
        $value = '123abc';

        new SampleIntegerValue($value, SampleIntegerValue::TYPE_CHECK_LOOSE);
    }

}