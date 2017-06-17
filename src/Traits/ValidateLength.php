<?php
namespace msng\Values\Traits;

trait ValidateLength
{
    /**
     * @var bool
     */
    protected $multiByte = false;

    /**
     * @var string|null
     */
    protected $encoding;

    /**
     * @var int|null
     */
    protected $minLength;

    /**
     * @var int|null
     */
    protected $maxLength;

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
        if ($this->minLength) {
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
        if ($this->maxLength) {
            if ($this->strlen($value) > $this->maxLength) {
                throw new \LengthException(sprintf('The maximum length of the value for %s is %d; "%s" given.', __CLASS__, $this->maxLength, $value));
            }
        }
    }

    /**
     * @param $value
     * @return int
     */
    private function strlen($value)
    {
        if ($this->isMultiByte()) {
            return mb_strlen($value, $this->getEncoding());
        } else {
            return strlen($value);
        }
    }

    /**
     * @return bool
     */
    private function isMultiByte()
    {
        return $this->multiByte;
    }

    /**
     * @return string
     */
    private function getEncoding()
    {
        return $this->encoding;
    }
}