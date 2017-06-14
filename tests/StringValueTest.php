<?php
namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleStringValue;
use PHPUnit\Framework\TestCase;

class StringValueTest extends TestCase
{
    public function testJustMaxLength()
    {
        $this->newAndAssertSame('abcdefgh');
    }

    public function testJustMinLength()
    {
        $this->newAndAssertSame('abcdef');
    }

    public function testBetweenMinAndMaxLength() {
        $this->newAndAssertSame('abcdefg');
    }

    /**
     * @expectedException \LengthException
     */
    public function testOverMaxLength()
    {
        $this->newAndAssertSame('abcdefghi');
    }

    /**
     * @expectedException \LengthException
     */
    public function testUnderMinLength()
    {
        $this->newAndAssertSame('abcde');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testArray()
    {
        $this->newAndAssertSame(['a', 'b']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testObject()
    {
        $this->newAndAssertSame(new \stdClass());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIntegerWithDefaultStrictMode()
    {
        SampleStringValue::setDefaultTypeCheckMode(SampleStringValue::TYPE_CHECK_STRICT);

        new SampleStringValue(1234567);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIntegerWithStrictMode()
    {
        new SampleStringValue(1234567, SampleStringValue::TYPE_CHECK_STRICT);
    }

    public function testIntegerWithLooseMode()
    {
        $value = 1234567;
        $string = new SampleStringValue($value, SampleStringValue::TYPE_CHECK_LOOSE);

        $this->assertEquals($value, $string->get());
    }

    public function testToString()
    {
        $value = 'echo_me';
        $this->expectOutputString($value);

        $stringValue = new SampleStringValue($value);

        echo $stringValue;
    }

    private function newAndAssertSame($value)
    {
        $string = new SampleStringValue($value);

        $this->assertSame($value, $string->get());
    }

}
