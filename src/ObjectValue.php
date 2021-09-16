<?php

namespace msng\Values;

use InvalidArgumentException;

abstract class ObjectValue extends Value
{
    protected string $class;

    protected function validate($value)
    {
        $type = gettype($value);

        if ($type !== 'object') {
            throw new InvalidArgumentException(sprintf('The value for %s must be an object; %s given.', get_class($this), $type));
        }

        if ($this->class && !$value instanceof $this->class) {
            throw new InvalidArgumentException(sprintf('The value for %s must be an instance of %s; %s given.', get_class($this), $this->class, get_class($value)));
        }
    }
}
