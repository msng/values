<?php

namespace msng\Values\Traits;

trait ValidateRegex
{
    /**
     * @var string|null
     */
    protected $regex;

    /**
     * @param $value
     */
    private function validateRegex($value)
    {
        if ($this->regex && ! preg_match($this->regex, $value)) {
            throw new \InvalidArgumentException(sprintf('The value of %s must match `%s`; "%s" given.', __CLASS__, $this->regex, $value));
        }
    }
}