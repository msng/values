<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleStrictStringValue extends StringValue
{
    protected $minLength = 6;
    protected $maxLength = 8;

    protected $typeCheck = self::TYPE_CHECK_STRICT;
}