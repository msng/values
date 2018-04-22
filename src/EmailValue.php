<?php

namespace msng\Values;

abstract class EmailValue extends StringValue
{
    /**
     * @var bool Set true to trim() whitespaces the value before validation.
     */
    protected $trim = true;

    /**
     * @param string $value
     */
    protected function validate($value)
    {
        parent::validate($value);

        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException(sprintf('The value of %s must be a valid email; "%s" given.', __CLASS__, $value));
        }
    }
}