<?php

namespace msng\Values\Tests;

use DateTime;
use InvalidArgumentException;
use msng\Values\Tests\SampleClasses\SampleDateTimeValue;
use PHPUnit\Framework\TestCase;
use stdClass;

class DateTimeValueTest extends TestCase
{
    public function testTimestamp()
    {
        $dateTime = new DateTime();
        $dateTimeValue = new SampleDateTimeValue($dateTime);

        $this->assertSame($dateTime->getTimestamp(), $dateTimeValue->getValue()->getTimestamp());
    }

    public function testWrongClass()
    {
        $this->expectException(InvalidArgumentException::class);
        new SampleDateTimeValue(new stdClass());

    }
}
