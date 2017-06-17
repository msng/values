<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\MbStringValue;

class SampleTruncatedMbStringValue extends MbStringValue
{
    protected $minLength = 6;
    protected $maxLength = 8;
    protected $truncate = true;
}