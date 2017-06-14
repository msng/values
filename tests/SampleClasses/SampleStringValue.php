<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleStringValue extends StringValue
{
    protected $minLength = 6;
    protected $maxLength = 8;
}