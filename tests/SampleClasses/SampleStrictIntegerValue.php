<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\IntegerValue;

class SampleStrictIntegerValue extends IntegerValue
{
    protected $typeCheck = self::TYPE_CHECK_STRICT;
}