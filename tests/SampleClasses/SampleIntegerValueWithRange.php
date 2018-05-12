<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\IntegerValue;

class SampleIntegerValueWithRange extends IntegerValue
{
    protected $min = 1;
    protected $max = 100;
}