<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents the content of a media message to be sent. It should be one of
 *
 * 
 *
 * InputMediaPhoto
 *
 * InputMediaVideo
 *
 */
class InputMedia extends Object
{
    /**
     * InputMedia constructor.
     *
     */
    public function __construct()
    {
    }

    /**
      * Creates InputMedia object from data.
      * @param \stdClass $data
      * @return InputMedia
      */
    public static function createFromObject(?\stdClass $data): ?InputMedia
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputMedia(
            
        );


        return $object;
    }

    /**
      * Creates array of InputMedia objects from data.
      * @param array $data
      * @return InputMedia[]
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
