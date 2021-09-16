<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleStringValue extends StringValue
{
    protected int $minLength = 6;
    protected int $maxLength = 8;
}
