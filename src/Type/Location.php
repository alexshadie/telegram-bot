<?php

namespace alexshadie\TelegramBot\Type;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents a point on the map.
 *
 */
class Location extends Object
{
    /**
     * Longitude as defined by sender
     *
     * @var float
     */
    private $longitude;

    /**
     * Latitude as defined by sender
     *
     * @var float
     */
    private $latitude;

    /**
     * Longitude as defined by sender
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Latitude as defined by sender
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
      * Creates Location object from data.
      * @param \stdClass $data
      * @return Location
      */
    public static function createFromObject(?\stdClass $data): ?Location
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Location();
        $object->longitude = $data->longitude;
        $object->latitude = $data->latitude;
        return $object;
    }

    /**
      * Creates array of Location objects from data.
      * @param array $data
      * @return Location[]
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
