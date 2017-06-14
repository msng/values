<?php

namespace msng\Values;

use msng\Values\Traits\ValidateLength;
use msng\Values\Traits\ValidateType;

abstract class StringValue extends ScalarValue
{
    use ValidateLength;

    protected $type = 'string';

    public function __construct($value, $typeCheckMode = null)
    {
        $this->prepareTypeCheck($typeCheckMode);

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
