<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\StringValue;

class SampleStringValueWithRegex extends StringValue
{
    protected string $regex = '/^[0-9a-z]{4,8}$/';
}
