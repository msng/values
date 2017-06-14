<?php

namespace msng\Values;

abstract class ScalarValue extends Value
{
    const TYPE_CHECK_STRICT = true;
    const TYPE_CHECK_LOOSE = false;

    /**
     * @var string Expected type; must be assigned in the using class.
     */
    protected $type;

    /**
     * Type check mode
     *  - true: the type of $value must be the same as expected type
     *  - false: any $value is converted to expected type
     */
    private $typeCheckMode;

    /**
     * Default type check mode applied to all new instances
     *
     * @var bool
     */
    protected static $defaultTypeCheckMode = self::TYPE_CHECK_LOOSE;

    /**
     * @param $typeCheckMode
     */
    protected function prepareTypeCheck($typeCheckMode)
    {
        if (is_null($typeCheckMode)) {
            $typeCheckMode = static::$defaultTypeCheckMode;
        }

        if (!static::isAllowedTypeCheckMode($typeCheckMode)) {
            throw new \InvalidArgumentException(sprintf('The second argument of %s must be %s or %s; %s given.', get_class($this), self::TYPE_CHECK_STRICT, self::TYPE_CHECK_LOOSE, gettype($typeCheckMode)));
        }

        $this->typeCheckMode = $typeCheckMode;
    }

    /**
     * Set default to loose mode
     * @param int $defaultTypeCheckMode
     */
    final public static function setDefaultTypeCheckMode($defaultTypeCheckMode)
    {
        if (!static::isAllowedTypeCheckMode($defaultTypeCheckMode)) {
            throw new \InvalidArgumentException('Invalid argument for default type check mode.');
        }

        static::$defaultTypeCheckMode = $defaultTypeCheckMode;
    }

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
        if (($this->typeCheckMode === self::TYPE_CHECK_STRICT) && (gettype($value) !== $this->type)) {
            throw new \InvalidArgumentException(sprintf('The value for %s must be %s; %s given.', get_class($this), $this->type, gettype($value)));
        }

        $filteredValue = $this->Setfilter($value);

        if (gettype($filteredValue) !== $this->type) {
            throw new \InvalidArgumentException(sprintf('Invalid argument for %s.', get_class($this)));
        }
    }

    /**
     * Checks if $typeMode has acceptable value.
     * @param $typeCheckMode
     * @return bool
     */
    private static function isAllowedTypeCheckMode($typeCheckMode) {
        if (in_array($typeCheckMode, [self::TYPE_CHECK_STRICT, self::TYPE_CHECK_LOOSE], true)) {
            return true;
        } else {
            return false;
        }
    }

}
