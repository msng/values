<?php

namespace msng\Values;

use DateTimeInterface;

/**
 * @method DateTimeInterface getValue()
 */
abstract class DateTimeValue extends ObjectValue
{
    protected $class = DateTimeInterface::class;
}
