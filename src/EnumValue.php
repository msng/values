<?php

namespace msng\Values;

/**
 * Class EnumValue
 *
 * Extend this class and define enum values as class constants.
 */
abstract class EnumValue extends Value
{
    /**
     * @var array
     */
    private $enums;

    /**
     * @var array
     */
    protected static $labels = [];

    /**
     * EnumValue constructor.
     * @param mixed|null $value
     */
    public function __construct($value = null)
    {
        $this->enums = (new \ReflectionClass($this))->getConstants();

        parent::__construct($value);
    }

    /**
     * @return string|null
     */
    public function label()
    {
        if (array_key_exists($this->value, static::$labels)) {
            return static::$labels[$this->value];
        }

        return null;
    }

    /**
     * @return array
     */
    public static function getLabels()
    {
        return static::$labels;
    }

    /**
     * @param mixed $value
     */
    protected function validate($value)
    {
        $this->validateEnum($value);
    }

    /**
     * @param $value
     */
    private function validateEnum($value)
    {
        if (! in_array($value, $this->enums)) {
            throw new \InvalidArgumentException(sprintf('Value for %s must be one of (%s); "%s" given.', get_class($this), implode('|', $this->enums), $value));
        }
    }

}