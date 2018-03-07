<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Contains information about why a request was unsuccessful.
 *
 */
class ResponseParameters extends Object
{
    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     */
    private $migrate_to_chat_id;

    /**
     * In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     *
     * @var int|null
     */
    private $retry_after;

    /**
     * The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits,
     * so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrate_to_chat_id;
    }

    /**
     * In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     *
     * @return int|null
     */
    public function getRetryAfter(): ?int
    {
        return $this->retry_after;
    }

    /**
      * Creates ResponseParameters object from data.
      * @param \stdClass $data
      * @return ResponseParameters
      */
    public static function createFromObject(?\stdClass $data): ?ResponseParameters
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ResponseParameters();
        $object->migrate_to_chat_id = $data->migrate_to_chat_id ?? null;
        $object->retry_after = $data->retry_after ?? null;
        return $object;
    }

    /**
      * Creates array of ResponseParameters objects from data.
      * @param array $data
      * @return ResponseParameters[]
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
