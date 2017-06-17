<?php

namespace msng\Values;

class MbStringValue extends StringValue
{
    /**
     * @var bool
     */
    protected $multiByte = true;

    /**
     * MbStringValue constructor.
     * @param string $value
     * @param string|null $fromEncoding
     */
    public function __construct($value, $fromEncoding = null)
    {
        $this->encoding = $this->prepareEncoding($this->encoding);
        $fromEncoding = $this->prepareEncoding($fromEncoding);

        if ($this->encoding !== $fromEncoding) {
            $value = mb_convert_encoding($value, $this->encoding, $fromEncoding);
        }

        parent::__construct($value);
    }

    /**
     * @param string|null $encoding
     * @return string
     */
    private function prepareEncoding($encoding)
    {
        if (is_null($encoding)) {
            $encoding = mb_internal_encoding();
        }

        return $encoding;
    }

}