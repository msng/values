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
        $this->enums = static::getConstants();

        parent::__construct($value);
    }

    /**
     * @return array()
     */
    private static function getConstants()
    {
        try {
            return (new \ReflectionClass(static::class))->getConstants();
        } catch (\ReflectionException $exception) {
            // Should never happen. Just catch and throw in favor of IDE inspection.
            throw new \InvalidArgumentException('A \ReflectionException was thrown: ' . $exception->getMessage());
        }
    }

    /**
     * @return string|null
     */
    public function getLabel()
    {
        if (array_key_exists($this->value, static::$labels)) {
            return static::$labels[$this->value];
        }

        return null;
    }

    public static function getValues()
    {
        return static::getConstants();
    }

    /**
     * @return array
     */
    public static function getLabels()
    {
        return static::$labels;
    }

    /**
     * @param $key
     * @return string
     */
    public static function getLabelFor($key)
    {
        if (! array_key_exists($key, static::$labels)) {
            throw new \InvalidArgumentException();
        }

        return static::$labels[$key];
    }

    /**
     * @param $value
     * @return bool
     */
    public static function accepts($value)
    {
        return in_array($value, static::getConstants());
    }

    /**
     * @param $name
     * @param $arguments
     * @return static
     */
    final public static function __callStatic($name, $arguments)
    {
        $value = constant("static::$name");

        return new static($value);
    }

    /**
     * @param $name
     * @param $arguments
     * @return bool
     * @throws \Exception
     */
    final public function __call($name, $arguments)
    {
        $is = 'is';

        if (strpos($name, $is) === 0) {
            $constName = substr($name, strlen($is));
            $const = "static::$constName";

            if (defined("static::$constName")) {
                return $this->value === constant($const);
            }

            $constName = ltrim(strtoupper(preg_replace('/([A-Z])/', '_$1', $constName)), '_');
            $const = "static::$constName";

            if (defined("static::$constName")) {
                return $this->value === constant($const);
            }
        }

        throw new \BadMethodCallException("Call to undefined method " . static::class . '::' . $name . '()');
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
        if (! static::accepts($value)) {
            throw new \InvalidArgumentException(sprintf('Value for %s must be one of (%s); "%s" given.', get_class($this), implode('|', $this->enums), $value));
        }
    }

}
