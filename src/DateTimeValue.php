<?php

namespace msng\Values;

use DateTimeInterface;

/**
 * @method DateTimeInterface getValue()
 */
abstract class DateTimeValue extends ObjectValue
{
    protected string $class = DateTimeInterface::class;
    protected bool $acceptsFuture = true;

    /**
     * @param DateTimeInterface $value
     */
    protected function validate($value)
    {
        parent::validate($value);

        if ($this->acceptsFuture === false) {
            if ($this->isFuture($value)) {
                throw new \InvalidArgumentException(sprintf('%s does not accept future time; %s given.', get_class($this), $value->getTimestamp()));
            }
        }
    }

    private function isFuture(DateTimeInterface $value): bool
    {
        return $value->getTimestamp() > time();
    }
}
