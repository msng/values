<?php

namespace msng\Values;

use msng\Values\Traits\Truncate;
use msng\Values\Traits\ValidateLength;
use msng\Values\Traits\ValidateRegex;

/**
 * @method string getValue()
 */
abstract class StringValue extends ScalarValue
{
    use ValidateLength;
    use ValidateRegex;
    use Truncate;

    protected string $type = 'string';
    protected int $typeCheck = self::TYPE_CHECK_LOOSE;

    /**
     * Too long string is automatically truncated or not
     *  - true: $value is truncated to the length of $maxLength
     *  - false: LengthException is thrown if $value is longer than $maxLength
     */
    protected bool $truncate = false;

    /**
     * @param mixed $value
     * @return mixed|string
     */
    protected function setFilter($value)
    {
        if (is_scalar($value)) {
            $value = (string)$value;

            if ($this->truncate === true) {
                $value = $this->truncate($value);
            }
        }

        return $value;
    }

    /**
     * @param string $value
     */
    protected function validate($value)
    {
        parent::validate($value);

        if (isset($this->regex)) {
            $this->validateRegex($value);
        }

        if ($this->truncate === false) {
            $this->validateLength($value);
        }
    }

}
