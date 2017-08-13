<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\EnumValue;

class SampleEnum extends EnumValue
{
    const SPADE = 1;
    const HEART = 2;
    const DIAMOND = 3;
    const CLUB = 4;

    protected static $labels = [
        self::SPADE => 'Spade',
        self::HEART => 'Heart',
        self::DIAMOND => 'Diamond',
    ];
}
