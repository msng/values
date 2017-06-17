<?php

namespace msng\Values\Traits;

/**
 * @property bool $multiByte
 * @property int $maxLength
 * @property string $encoding
 */
trait Truncate
{
    protected function truncate($value)
    {
        if ($this->multiByte === true) {
            $value = mb_substr($value, 0, $this->maxLength, $this->encoding);
        } else {
            $value = substr($value, 0, $this->maxLength);
        }

        return $value;
    }

}
