<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleMbStringValue;
use PHPUnit\Framework\TestCase;

class MbStringValueTest extends TestCase
{
    public function testJustMaxLength()
    {
        $this->newAndAssertSame('いろはにほへ');
    }

    public function testJustMinLength()
    {
        $this->newAndAssertSame('いろはにほへとち');
    }

    public function testBetweenMinAndMaxLength() {
        $this->newAndAssertSame('いろはにほへと');
    }

    /**
     * @expectedException \LengthException
     */
    public function testOverMaxLength()
    {
        $this->newAndAssertSame('いろはにほへとちりぬるを');
    }

    /**
     * @expectedException \LengthException
     */
    public function testUnderMinLength()
    {
        $this->newAndAssertSame('いろは');
    }

    public function testToString()
    {
        $value = 'これはテストです';
        $this->expectOutputString($value);

        $stringValue = new SampleMbStringValue($value);

        echo $stringValue;
    }

    private function newAndAssertSame($value)
    {
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->get());
    }

}