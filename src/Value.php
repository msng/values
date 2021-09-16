<?php

namespace msng\Values;

abstract class Value
{
    /**
     * @var mixed Stores the value
     */
    protected $value;

    /**
     * @var bool Set true to trim() whitespaces the value before validation.
     */
    protected bool $trim = false;

    /**
     * Value constructor.
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @param mixed $value
     */
    private function setValue($value)
    {
        if ($this->trim === true) {
            $value = trim($value);
        }

        $this->validate($value);
        $value = $this->setFilter($value);

        $this->value = $value;
    }

    /**
     * Filters the value after validation.
     * @param mixed $value
     * @return mixed
     */
    protected function setFilter($value)
    {
        return $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function is($value): bool
    {
        if ($this->value === $value) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param Value $valueObject
     * @return bool
     */
    public function hasSameValueAs(Value $valueObject): bool
    {
        return $this->is($valueObject->value);
    }

    /**
     * @param Value $valueObject
     * @return bool
     */
    public function isSameAs(Value $valueObject): bool
    {
        if ($valueObject instanceof static) {
            return $this->hasSameValueAs($valueObject);
        }

        return false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }

    /**
     * @param mixed $value
     */
    abstract protected function validate($value);
}
