<?php

namespace msng\Values\Traits;

/**
 * @property int $maxLength
 */
trait Truncate
{
    protected function truncate($value)
    {
        return $this->substr($value, 0, $this->maxLength);
    }

    /**
     * @param mixed $value
     * @param int $start
     * @param int|null $length
     * @return false|string
     */
    protected function substr($value, int $start, int $length = null)
    {
        return substr($value, $start, $length);
    }

}
