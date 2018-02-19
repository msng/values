<?php
namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleStrictStringValue;
use msng\Values\Tests\SampleClasses\SampleStringValue;
use msng\Values\Tests\SampleClasses\SampleTruncatedStringValue;
use PHPUnit\Framework\TestCase;

class StringValueTest extends TestCase
{
    public function testJustMaxLength()
    {
        $value = 'abcdefgh';
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    public function testJustMinLength()
    {
        $value = 'abcdef';
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    public function testBetweenMinAndMaxLength() {
        $value = 'abcdefg';
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    /**
     * @expectedException \LengthException
     */
    public function testOverMaxLength()
    {
        $value = 'abcdefghi';
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    /**
     * @expectedException \LengthException
     */
    public function testUnderMinLength()
    {
        $value = 'abcde';
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testArray()
    {
        $value = ['a', 'b'];
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testObject()
    {
        $value = new \stdClass();
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIntegerWithStrictMode()
    {
        new SampleStrictStringValue(1234567);
    }

    public function testIntegerWithLooseMode()
    {
        $value = 1234567;
        $string = new SampleStringValue($value);

        $this->assertEquals($value, $string->getValue());
    }

    public function testToString()
    {
        $value = 'echo_me';
        $this->expectOutputString($value);

        $stringValue = new SampleStringValue($value);

        echo $stringValue;
    }

    /**
     * @expectedException \LengthException
     */
    public function testMultiByteStringIsCountedInBytes()
    {
        new SampleStringValue('いろはにほへと');
    }

    public function testTruncatedString()
    {
        $value = 'abcdefghijklmn';
        $expected = 'abcdefgh';

        $stringValue = new SampleTruncatedStringValue($value);

        $this->assertSame($expected, $stringValue->getValue());
    }

}
