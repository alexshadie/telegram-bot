<?php


namespace alexshadie\TelegramBot\Bot\Exception;


use Throwable;

class TelegramResponseException extends \Exception
{
    private $rawData;
    public function __construct(string $message = "", int $code = 0, $rawData = null, Throwable $previous = null)
    {
        $this->rawData = $rawData;
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__. ": " . $this->code . " - " . $this->message . " (" . var_export($this->rawData, 1) . ")";
    }
}