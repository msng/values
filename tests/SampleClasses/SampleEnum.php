<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\EnumValue;

/**
 * @method static static SPADE()
 * @method static static HEART()
 * @method static static DIAMOND()
 * @method static static CLUB()
 * @method bool isSPADE()
 * @method bool isHEART()
 */
class SampleEnum extends EnumValue
{
    const SPADE = 1;
    const HEART = 2;
    const DIAMOND = 3;
    const CLUB = 4;

    protected static array $labels = [
        self::SPADE => 'Spade',
        self::HEART => 'Heart',
        self::DIAMOND => 'Diamond'
    ];
}
