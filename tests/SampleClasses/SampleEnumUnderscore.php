<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\EnumValue;

/**
 * @method bool isFirstValue()
 * @method bool isSecondValue()
 */
class SampleEnumUnderscore extends EnumValue
{
    const FIRST_VALUE = 1;
    const SECOND_VALUE = 2;

    protected static array $labels = [
        self::FIRST_VALUE => 'First',
        self::SECOND_VALUE => 'Second'
    ];
}
