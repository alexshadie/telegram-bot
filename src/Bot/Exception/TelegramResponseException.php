<?php


namespace alexshadie\TelegramBot\Bot\Exception;

/**
 * Thrown in case of invalid/unsupported Telegram response
 * @package alexshadie\TelegramBot\Bot\Exception
 */
class TelegramResponseException extends \Exception
{
    /** @var \stdClass */
    private $rawData;

    /**
     * TelegramResponseException constructor.
     * @param string $message Error message
     * @param int $code Error code
     * @param \stdClass $rawData Telegram response object
     * @param \Throwable|null $previous Previous exception
     */
    public function __construct(string $message = "", int $code = 0, ?\stdClass $rawData = null, ?\Throwable $previous = null)
    {
        $this->rawData = $rawData;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Gets raw data
     * @return null|\stdClass
     */
    public function getRawData(): ?\stdClass
    {
        return $this->rawData;
    }

    /**
     * Renders exception explanation
     * @return string
     */
    public function __toString(): string
    {
        $path = explode('\\', __CLASS__);
        return array_pop($path) . ": " . $this->code . " - '" . $this->message . "' (" . var_export($this->rawData, 1) . ")";
    }
}