<?php

namespace msng\Values;

use msng\Values\Traits\ValidateLength;
use msng\Values\Traits\ValidateRange;

abstract class IntegerValue extends ScalarValue
{
    use ValidateLength;
    use ValidateRange;

    /**
     * @var string
     */
    protected $type = 'integer';

    /**
     * @var bool
     */
    protected $typeCheck = self::TYPE_CHECK_LOOSE;

    /**
     * IntegerValue constructor.
     * @param int|string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    /**
     * @param string|int $value
     * @return int
     */
    protected function setFilter($value)
    {
        $value = filter_var($value, FILTER_VALIDATE_INT);

        return $value;
    }

    /**
     * @param string|int $value
     */
    protected function validate($value)
    {
        parent::validate($value);

        $this->validateLength($value);
        $this->validateRange($value);
    }

}