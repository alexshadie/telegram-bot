<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Represents the content of a location message to be sent as the result of an inline query. 
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InputLocationMessageContent extends Object
{
    /**
     * Latitude of the location in degrees
     *
     * @var float
     */
    private $latitude;

    /**
     * Longitude of the location in degrees
     *
     * @var float
     */
    private $longitude;

    /**
     * Period in seconds for which the location can be updated, should be between 60 and 86400.
     *
     * @var int|null
     */
    private $live_period;

    /**
     * Latitude of the location in degrees
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Longitude of the location in degrees
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Period in seconds for which the location can be updated, should be between 60 and 86400.
     *
     * @return int|null
     */
    public function getLivePeriod(): ?int
    {
        return $this->live_period;
    }

    /**
      * Creates InputLocationMessageContent object from data.
      * @param \stdClass $data
      * @return InputLocationMessageContent
      */
    public static function createFromObject(?\stdClass $data): ?InputLocationMessageContent
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputLocationMessageContent();
        $object->latitude = $data->latitude;
        $object->longitude = $data->longitude;
        $object->live_period = $data->live_period ?? null;
        return $object;
    }

    /**
      * Creates array of InputLocationMessageContent objects from data.
      * @param array $data
      * @return InputLocationMessageContent[]
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
