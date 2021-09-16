<?php

namespace msng\Values;

use msng\Values\Traits\ValidateLength;
use msng\Values\Traits\ValidateRange;

/**
 * @method int getValue()
 */
abstract class IntegerValue extends ScalarValue
{
    use ValidateLength;
    use ValidateRange;

    protected string $type = 'integer';
    protected int $typeCheck = self::TYPE_CHECK_STRICT;

    /**
     * @param string|int $value
     * @return int
     */
    protected function setFilter($value): int
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
        $this->validateRange($value);
    }
}
