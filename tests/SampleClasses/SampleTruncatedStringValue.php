<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleTruncatedStringValue extends StringValue
{
    protected int $minLength = 6;
    protected int $maxLength = 8;
    protected bool $truncate = true;
}
