<?php

namespace msng\Values;

abstract class Value
{
    /**
     * @var mixed Stores the value
     */
    protected $value;

    /**
     * Value constructor.
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->set($value);
    }

    /**
     * @param mixed $value
     */
    private function set($value)
    {
        $this->validate($value);
        $value = $this->setFilter($value);

        $this->value = $value;
    }

    /**
     * Filters the value after validation.
     * @param mixed $value
     * @return mixed
     */
    protected function setFilter($value) {
        return $value;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $value = $this->value;

        return $value;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return (string)$this->get();
    }

    /**
     * @param mixed $value
     */
    abstract protected function validate($value);
}
