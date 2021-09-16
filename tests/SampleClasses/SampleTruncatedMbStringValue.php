<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\MbStringValue;

class SampleTruncatedMbStringValue extends MbStringValue
{
    protected int $minLength = 6;
    protected int $maxLength = 8;
    protected bool $truncate = true;
}
