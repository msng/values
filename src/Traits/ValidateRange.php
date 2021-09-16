<?php
namespace msng\Values\Traits;

trait ValidateRange
{
    /**
     * @var int|null
     */
    protected int $min;

    /**
     * @var int|null
     */
    protected int $max;

    /**
     * @param $value
     */
    private function validateRange($value)
    {
        $this->validateMin($value);
        $this->validateMax($value);
    }

    /**
     * @param $value
     */
    private function validateMin($value)
    {
        if (isset($this->min)) {
            if ($value < $this->min) {
                throw new \UnexpectedValueException(sprintf('The minimum value of the value for %s is %d; "%s" given.', __CLASS__, $this->min, $value));
            }
        }
    }

    /**
     * @param $value
     */
    private function validateMax($value)
    {
        if (isset($this->max)) {
            if ($value > $this->max) {
                throw new \UnexpectedValueException(sprintf('The maximum value of the value for %s is %d; "%s" given.', __CLASS__, $this->max, $value));
            }
        }
    }

}
