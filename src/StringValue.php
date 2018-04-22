<?php

namespace msng\Values;

use msng\Values\Traits\Truncate;
use msng\Values\Traits\ValidateLength;
use msng\Values\Traits\ValidateRegex;

abstract class StringValue extends ScalarValue
{
    use ValidateLength;
    use ValidateRegex;
    use Truncate;

    const TRUNCATE_DO = true;
    const TRUNCATE_NOT = false;

    /**
     * @var string
     */
    protected $type = 'string';

    /**
     * @var bool
     */
    protected $typeCheck = self::TYPE_CHECK_LOOSE;

    /**
     * Too long string is automatically truncated or not
     *  - self::TRUNCATE_DO : $value is truncated to the length of $maxLength
     *  - self::TRUNCATE_NOT : LengthException is thrown if $value is longer than $maxLength
     *
     * @var bool
     */
    protected $truncate = self::TRUNCATE_NOT;

    /**
     * @param mixed $value
     * @return mixed|string
     */
    protected function setFilter($value)
    {
        if (is_scalar($value)) {
            $value = (string)$value;

            if ($this->truncate === self::TRUNCATE_DO) {
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

        if ($this->regex) {
            $this->validateRegex($value);
        }

        if ($this->truncate === self::TRUNCATE_NOT) {
            $this->validateLength($value);
        }
    }

}
