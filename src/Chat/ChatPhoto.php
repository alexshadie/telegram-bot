<?php

namespace alexshadie\TelegramBot\Chat;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents a chat photo.
 *
 */
class ChatPhoto extends Object
{
    /**
     * Unique file identifier of small (160x160) chat photo. This file_id can be used only for photo download.
     *
     * @var string
     */
    private $small_file_id;

    /**
     * Unique file identifier of big (640x640) chat photo. This file_id can be used only for photo download.
     *
     * @var string
     */
    private $big_file_id;

    /**
     * Unique file identifier of small (160x160) chat photo. This file_id can be used only for photo download.
     *
     * @return string
     */
    public function getSmallFileId(): string
    {
        return $this->small_file_id;
    }

    /**
     * Unique file identifier of big (640x640) chat photo. This file_id can be used only for photo download.
     *
     * @return string
     */
    public function getBigFileId(): string
    {
        return $this->big_file_id;
    }

    /**
      * Creates ChatPhoto object from data.
      * @param \stdClass $data
      * @return ChatPhoto
      */
    public static function createFromObject(?\stdClass $data): ?ChatPhoto
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ChatPhoto();
        $object->small_file_id = $data->small_file_id;
        $object->big_file_id = $data->big_file_id;
        return $object;
    }

    /**
      * Creates array of ChatPhoto objects from data.
      * @param array $data
      * @return ChatPhoto[]
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
