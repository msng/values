<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\MbStringValue;

class SampleMbStringValue extends MbStringValue
{
    protected int $minLength = 6;
    protected int $maxLength = 8;
}
