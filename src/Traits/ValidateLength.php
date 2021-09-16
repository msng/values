<?php
namespace msng\Values\Traits;

trait ValidateLength
{
    protected int $minLength;
    protected int $maxLength;

    /**
     * @param $value
     */
    private function validateLength($value)
    {
        $this->validateMinLength($value);
        $this->validateMaxLength($value);
    }

    /**
     * @param $value
     */
    private function validateMinLength($value)
    {
        if (isset($this->minLength)) {
            if ($this->strlen($value) < $this->minLength) {
                throw new \LengthException(sprintf('The minimum length of the value for %s is %d; "%s" given.', __CLASS__, $this->minLength, $value));
            }
        }
    }

    /**
     * @param $value
     */
    private function validateMaxLength($value)
    {
        if (isset($this->maxLength)) {
            if ($this->strlen($value) > $this->maxLength) {
                throw new \LengthException(sprintf('The maximum length of the value for %s is %d; "%s" given.', __CLASS__, $this->maxLength, $value));
            }
        }
    }

    /**
     * @param string $value
     * @return int
     */
    protected function strlen(string $value): int
    {
        return strlen($value);
    }

}
