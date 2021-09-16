<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleStrictStringValue extends StringValue
{
    protected int $minLength = 6;
    protected int $maxLength = 8;
    protected int $typeCheck = self::TYPE_CHECK_STRICT;
}
