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
    protected $trim = false;

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
        $value = $this->value;

        return $value;
    }

    /**
     * @return mixed
     * @deprecated Will be removed in the future version; Please use getValue() instead.
     */
    public function get()
    {
        return $this->getValue();
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function is($value)
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
    public function hasSameValueAs(Value $valueObject)
    {
        return $this->is($valueObject->value);
    }

    /**
     * @param Value $valueObject
     * @return bool
     */
    public function isSameAs(Value $valueObject)
    {
        if ($valueObject instanceof static) {
            return $this->hasSameValueAs($valueObject);
        }

        return false;
    }

    /**
     * @return mixed
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
