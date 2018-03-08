<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Represents the content of a venue message to be sent as the result of an inline query. 
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InputVenueMessageContent extends Object
{
    /**
     * Latitude of the venue in degrees
     *
     * @var float
     */
    private $latitude;

    /**
     * Longitude of the venue in degrees
     *
     * @var float
     */
    private $longitude;

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
     * Foursquare identifier of the venue, if known
     *
     * @var string|null
     */
    private $foursquare_id;

    /**
     * InputVenueMessageContent constructor.
     *
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquareId
     */
    public function __construct(float $latitude, float $longitude, string $title, string $address, ?string $foursquareId = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->title = $title;
        $this->address = $address;
        $this->foursquare_id = $foursquareId;
    }

    /**
     * Latitude of the venue in degrees
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Longitude of the venue in degrees
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
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
     * Foursquare identifier of the venue, if known
     *
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquare_id;
    }

    /**
      * Creates InputVenueMessageContent object from data.
      * @param \stdClass $data
      * @return InputVenueMessageContent
      */
    public static function createFromObject(?\stdClass $data): ?InputVenueMessageContent
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputVenueMessageContent(
            $data->latitude,
            $data->longitude,
            $data->title,
            $data->address
        );

        $object->foursquare_id = $data->foursquare_id ?? null;

        return $object;
    }

    /**
      * Creates array of InputVenueMessageContent objects from data.
      * @param array $data
      * @return InputVenueMessageContent[]
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
