<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\IntegerValue;

class SampleLooseIntegerValue extends IntegerValue
{
    protected int $typeCheck = self::TYPE_CHECK_LOOSE;
}
