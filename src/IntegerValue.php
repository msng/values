<?php

namespace msng\Values;

use msng\Values\Traits\ValidateLength;

abstract class IntegerValue extends ScalarValue
{
    use ValidateLength;

    protected $type = 'integer';

    /**
     * IntegerValue constructor.
     * @param int|string $value
     * @param bool|null $typeCheckMode
     */
    public function __construct($value, $typeCheckMode = null)
    {
        $this->prepareTypeCheck($typeCheckMode);

        parent::__construct($value);
    }

    /**
     * @param string|int $value
     * @return int
     */
    protected function setFilter($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT);
    }


    /**
     * @param string|int $value
     */
    protected function validate($value)
    {
        parent::validate($value);
        $this->validateLength($value);
    }

}