<?php

namespace msng\Values\Traits;

/**
 * @property int $maxLength
 */
trait Truncate
{
    protected function truncate($value)
    {
        $value = $this->substr($value, 0, $this->maxLength);

        return $value;
    }

    /**
     * @param mixed $value
     * @param int $start
     * @param int|null $length
     * @return mixed
     */
    protected function substr($value, $start, $length = null)
    {
        $value = substr($value, $start, $length);

        return $value;
    }

}
