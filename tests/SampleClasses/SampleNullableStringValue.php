<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleNullableStringValue extends StringValue
{
    protected bool $nullable = true;
}
