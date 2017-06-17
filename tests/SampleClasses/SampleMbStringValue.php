<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\MbStringValue;

class SampleMbStringValue extends MbStringValue
{
    protected $minLength = 6;
    protected $maxLength = 8;
}