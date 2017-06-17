<?php

namespace msng\Values\Tests;

use msng\Values\Tests\SampleClasses\SampleMbStringValue;
use msng\Values\Tests\SampleClasses\SampleSjisMbStringValue;
use PHPUnit\Framework\TestCase;

class MbStringValueTest extends TestCase
{
    public function testJustMaxLength()
    {
        $value = 'いろはにほへ';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->get());
    }

    public function testJustMinLength()
    {
        $value = 'いろはにほへとち';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->get());
    }

    public function testBetweenMinAndMaxLength() {
        $value = 'いろはにほへと';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->get());
    }

    /**
     * @expectedException \LengthException
     */
    public function testOverMaxLength()
    {
        $value = 'いろはにほへとちりぬるを';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->get());
    }

    /**
     * @expectedException \LengthException
     */
    public function testUnderMinLength()
    {
        $value = 'いろは';
        $string = new SampleMbStringValue($value);

        $this->assertSame($value, $string->get());
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

        $this->assertSame($sjis, $stringValue->get());
    }

//    /**
//     * @expectedException \LengthException
//     */
//    public function testDifferentEncodingsTooLong()
//    {
//        $value = '文字コードのテストです';
//        $stringValue = new SampleSjisMbStringValue($value);
//    }

}