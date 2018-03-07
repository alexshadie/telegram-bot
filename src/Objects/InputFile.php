<?php

namespace alexshadie\TelegramBot\Objects;


/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual
 * way that files are uploaded via the browser.
 *
 */
class InputFile extends Object
{
    /**
      * Creates InputFile object from data.
      * @param \stdClass $data
      * @return InputFile
      */
    public static function createFromObject(?\stdClass $data): ?InputFile
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputFile();
        return $object;
    }

    /**
      * Creates array of InputFile objects from data.
      * @param array $data
      * @return InputFile[]
      */
    public static function createFromObjectList(?array $data): ?array
    {
        if (is_null($data)) {
            return null;
        };
        $objects = [];
        foreach ($data as $row) {
            $objects[] = static::createFromObject($row);
        }
        return $objects;
    }

}
