<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleMbStringValue;
use msng\Values\Tests\SampleClasses\SampleSjisMbStringValue;
use msng\Values\Tests\SampleClasses\SampleTruncatedMbStringValue;
use PHPUnit\Framework\TestCase;

class MbStringValueTest extends TestCase
{
    public function testJustMaxLength()
    {
        $value = 'いろはにほへ';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    public function testJustMinLength()
    {
        $value = 'いろはにほへとち';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    public function testBetweenMinAndMaxLength() {
        $value = 'いろはにほへと';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    /**
     * @expectedException \LengthException
     */
    public function testOverMaxLength()
    {
        $value = 'いろはにほへとちりぬるを';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    /**
     * @expectedException \LengthException
     */
    public function testUnderMinLength()
    {
        $value = 'いろは';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->getValue());
    }

    public function testToString()
    {
        $value = 'これはテストです';
        $this->expectOutputString($value);

        $stringValue = new SampleMbStringValue($value);

        echo $stringValue;
    }

    public function testDifferentEncodings()
    {
        $utf8 = '文字コードテスト';
        $sjis = mb_convert_encoding($utf8, 'SJIS', mb_internal_encoding());
        $stringValue = new SampleSjisMbStringValue($utf8);

        $this->assertSame($sjis, $stringValue->getValue());
    }

    public function testTruncatedString()
    {
        $value = 'いろはにほへとちりぬるを';
        $expected = 'いろはにほへとち';

        $stringValue = new SampleTruncatedMbStringValue($value);

        $this->assertSame($expected, $stringValue->getValue());
    }

}