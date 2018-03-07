<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\Location;

/**
 * This object represents a venue.
 *
 */
class Venue extends Object
{
    /**
     * Venue location
     *
     * @var Location
     */
    private $location;

    /**
     * Name of the venue
     *
     * @var string
     */
    private $title;

    /**
     * Address of the venue
     *
     * @var string
     */
    private $address;

    /**
     * Foursquare identifier of the venue
     *
     * @var string|null
     */
    private $foursquare_id;

    /**
     * Venue location
     *
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * Name of the venue
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Address of the venue
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Foursquare identifier of the venue
     *
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquare_id;
    }

    /**
      * Creates Venue object from data.
      * @param \stdClass $data
      * @return Venue
      */
    public static function createFromObject(?\stdClass $data): ?Venue
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Venue();
        $object->location = Location::createFromObject($data->location);
        $object->title = $data->title;
        $object->address = $data->address;
        $object->foursquare_id = $data->foursquare_id ?? null;
        return $object;
    }

    /**
      * Creates array of Venue objects from data.
      * @param array $data
      * @return Venue[]
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
