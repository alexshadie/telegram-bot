<?php

namespace alexshadie\TelegramBot\Game;

use alexshadie\TelegramBot\Objects\Object;

/**
 * A placeholder, currently holds no information. Use BotFather to set up your game.
 *
 */
class CallbackGame extends Object
{
    /**
      * Creates CallbackGame object from data.
      * @param \stdClass $data
      * @return CallbackGame
      */
    public static function createFromObject(?\stdClass $data): ?CallbackGame
    {
        if (is_null($data)) {
            return null;
        }
        $object = new CallbackGame();
        return $object;
    }

    /**
      * Creates array of CallbackGame objects from data.
      * @param array $data
      * @return CallbackGame[]
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
