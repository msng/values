<?php

namespace msng\Values;

use msng\Values\Traits\ValidateLength;

abstract class StringValue extends ScalarValue
{
    use ValidateLength;

    /**
     * @var string
     */
    protected $type = 'string';

    /**
     * @var bool
     */
    protected $typeCheck = self::TYPE_CHECK_LOOSE;

    /**
     * StringValue constructor.
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    protected function setFilter($value)
    {
        if (is_scalar($value)) {
            $value = (string)$value;
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    protected function validate($value)
    {
        parent::validate($value);
        $this->validateLength($value);
    }

}
