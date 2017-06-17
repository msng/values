<?php

namespace msng\Values;

class MbStringValue extends StringValue
{
    /**
     * @var bool
     */
    protected $multiByte = true;

    /**
     * @var string
     */
    protected $encoding;

    /**
     * MbStringValue constructor.
     * @param string $value
     * @param string|null $toEncoding
     * @param string|null $fromEncoding
     * @param bool|null $typeCheckMode
     */
    public function __construct($value, $toEncoding = null, $fromEncoding = null, $typeCheckMode = null)
    {
        $toEncoding = $this->trimEncoding($toEncoding);
        $fromEncoding = $this->trimEncoding($fromEncoding);

        if ($toEncoding !== $fromEncoding) {
            $value = mb_convert_encoding($value, $toEncoding, $fromEncoding);
        }

        $this->encoding = $toEncoding;

        parent::__construct($value, $typeCheckMode);
    }

    /**
     * @param string|null $encoding
     * @return string
     */
    private function trimEncoding($encoding)
    {
        if (is_null($encoding)) {
            $encoding = mb_internal_encoding();
        }

        return $encoding;
    }

}