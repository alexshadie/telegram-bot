<?php

namespace alexshadie\TelegramBot\Objects;

/**
 * Class InputFile
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are uploaded via the browser.
 * @package telegram
 */
class InputFile extends Object
{
    private $localFileName;

    public function __construct($localFileName)
    {
        $this->localFileName = $localFileName;
    }

    public function getPostObject()
    {
        return new \CURLFile($this->localFileName);
    }
}