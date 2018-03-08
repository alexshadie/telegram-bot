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
     * Venue constructor.
     *
     * @param Location $location
     * @param string $title
     * @param string $address
     * @param string|null $foursquareId
     */
    public function __construct(Location $location, string $title, string $address, ?string $foursquareId = null)
    {
        $this->location = $location;
        $this->title = $title;
        $this->address = $address;
        $this->foursquare_id = $foursquareId;
    }

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
        $object = new Venue(
            Location::createFromObject($data->location),
            $data->title,
            $data->address
        );

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
