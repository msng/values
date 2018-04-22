<?php

namespace msng\Values\Tests;

use PHPUnit\Framework\TestCase;

class EmailValueTest extends TestCase
{
    public function testValidEmail()
    {
        $email = ' test@example.com ';
        $expected = 'test@example.com';
        $emailValue = new SampleEmailValue($email);

        $this->assertSame($expected, $emailValue->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidEmail()
    {
        $email = 'in.valid';

        new SampleEmailValue($email);
    }

}
