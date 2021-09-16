<?php

namespace msng\Values;

class MbStringValue extends StringValue
{
    const COUNT_BYTE = 1;
    const COUNT_MULTI_BYTE = 2;

    /**
     * How characters are counted at length validation or truncate
     *  - self::COUNT_MULTI_BYTE : count characters as multi-byte
     *  - self::COUNT_BYTE : count in bytes
     */
    protected int $count = self::COUNT_MULTI_BYTE;

    protected string $encoding;

    /**
     * MbStringValue constructor.
     * @param string $value
     * @param string|null $fromEncoding
     */
    public function __construct($value, string $fromEncoding = null)
    {
        $this->encoding = $this->prepareEncoding($this->encoding ?? null);
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
    private function prepareEncoding(?string $encoding): ?string
    {
        if (is_null($encoding)) {
            $encoding = mb_internal_encoding();
        }

        return $encoding;
    }

    /**
     * @param string $value
     * @return int
     */
    protected function strlen(string $value): int
    {
        if ($this->count === self::COUNT_MULTI_BYTE) {
            return mb_strlen($value, $this->getEncoding());
        } else {
            return strlen($value);
        }
    }

    /**
     * @param mixed $value
     * @param int $start
     * @param null $length
     * @return bool|string
     */
    protected function substr($value, int $start, $length = null)
    {
        if ($this->count === self::COUNT_MULTI_BYTE) {
            $value = mb_substr($value, 0, $this->maxLength, $this->getEncoding());
        } else {
            $value = substr($value, 0, $this->maxLength);
        }

        return $value;
    }

    /**
     * @return string
     */
    private function getEncoding(): ?string
    {
        return $this->encoding;
    }
}
