<?php

namespace msng\Values\Tests\SampleClasses;

use msng\Values\MbStringValue;

class SampleSjisMbStringValue extends MbStringValue
{
    protected int $minLength = 6;
    protected int $maxLength = 8;
    protected string $encoding = 'SJIS';
}
