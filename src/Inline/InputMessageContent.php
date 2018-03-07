<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents the content of a message to be sent as a result of an inline query. Telegram clients currently
 * support the following 4 types:
 *
 * 
 *
 * InputTextMessageContent
 *
 * InputLocationMessageContent
 *
 * InputVenueMessageContent
 *
 * InputContactMessageContent
 *
 */
class InputMessageContent extends Object
{
    /**
      * Creates InputMessageContent object from data.
      * @param \stdClass $data
      * @return InputMessageContent
      */
    public static function createFromObject(?\stdClass $data): ?InputMessageContent
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputMessageContent();
        return $object;
    }

    /**
      * Creates array of InputMessageContent objects from data.
      * @param array $data
      * @return InputMessageContent[]
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
