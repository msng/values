<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleTruncatedStringValue extends StringValue
{
    protected $minLength = 6;
    protected $maxLength = 8;
    protected $truncate = true;
}