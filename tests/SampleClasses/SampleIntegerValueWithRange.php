<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\IntegerValue;

class SampleIntegerValueWithRange extends IntegerValue
{
    protected int $min = 1;
    protected int $max = 100;
}
