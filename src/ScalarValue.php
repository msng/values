<?php

namespace msng\Values;

abstract class ScalarValue extends Value
{
    const TYPE_CHECK_STRICT = 1;
    const TYPE_CHECK_LOOSE = 2;

    /**
     * @var string Expected type; must be assigned in the using class.
     */
    protected string $type;

    /**
     * Type check mode
     *  - self::TYPE_CHECK_STRICT : the type of $value must be the same as expected type
     *  - self::TYPE_CHECK_LOOSE : any $value is converted to expected type
     */
    protected int $typeCheck = self::TYPE_CHECK_STRICT;

    protected bool $nullable = false;

    /**
     * @param mixed $value
     */
    protected function validate($value)
    {
        $this->validateType($value);
    }

    /**
     * @param mixed $value
     */
    protected function validateType($value)
    {
        if ($this->nullable === true && is_null($value)) {
            return;
        }

        if (($this->typeCheck === self::TYPE_CHECK_STRICT) && (gettype($value) !== $this->type)) {
            throw new \InvalidArgumentException(sprintf('The value for %s must be %s; %s given.', get_class($this), $this->type, gettype($value)));
        }

        $filteredValue = $this->setfilter($value);

        if (gettype($filteredValue) !== $this->type) {
            throw new \InvalidArgumentException(sprintf('Invalid argument for %s.', get_class($this)));
        }
    }

}
