<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the venue.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InlineQueryResultVenue extends Object
{
    /**
     * Type of the result, must be venue
     *
     * @var string
     */
    private $type;

    /**
     * Unique identifier for this result, 1-64 Bytes
     *
     * @var string
     */
    private $id;

    /**
     * Latitude of the venue location in degrees
     *
     * @var float
     */
    private $latitude;

    /**
     * Longitude of the venue location in degrees
     *
     * @var float
     */
    private $longitude;

    /**
     * Title of the venue
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
     * Foursquare identifier of the venue if known
     *
     * @var string|null
     */
    private $foursquare_id;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * Content of the message to be sent instead of the venue
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * Url of the thumbnail for the result
     *
     * @var string|null
     */
    private $thumb_url;

    /**
     * Thumbnail width
     *
     * @var int|null
     */
    private $thumb_width;

    /**
     * Thumbnail height
     *
     * @var int|null
     */
    private $thumb_height;

    /**
     * InlineQueryResultVenue constructor.
     *
     * @param string $type
     * @param string $id
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquareId
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     * @param string|null $thumbUrl
     * @param int|null $thumbWidth
     * @param int|null $thumbHeight
     */
    public function __construct(string $type, string $id, float $latitude, float $longitude, string $title, string $address, ?string $foursquareId = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null, ?string $thumbUrl = null, ?int $thumbWidth = null, ?int $thumbHeight = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->title = $title;
        $this->address = $address;
        $this->foursquare_id = $foursquareId;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
        $this->thumb_url = $thumbUrl;
        $this->thumb_width = $thumbWidth;
        $this->thumb_height = $thumbHeight;
    }

    /**
     * Type of the result, must be venue
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Unique identifier for this result, 1-64 Bytes
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Latitude of the venue location in degrees
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Longitude of the venue location in degrees
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Title of the venue
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
     * Foursquare identifier of the venue if known
     *
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquare_id;
    }

    /**
     * Inline keyboard attached to the message
     *
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * Content of the message to be sent instead of the venue
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
     * Url of the thumbnail for the result
     *
     * @return string|null
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumb_url;
    }

    /**
     * Thumbnail width
     *
     * @return int|null
     */
    public function getThumbWidth(): ?int
    {
        return $this->thumb_width;
    }

    /**
     * Thumbnail height
     *
     * @return int|null
     */
    public function getThumbHeight(): ?int
    {
        return $this->thumb_height;
    }

    /**
      * Creates InlineQueryResultVenue object from data.
      * @param \stdClass $data
      * @return InlineQueryResultVenue
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultVenue
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultVenue(
            $data->type,
            $data->id,
            $data->latitude,
            $data->longitude,
            $data->title,
            $data->address
        );

        $object->foursquare_id = $data->foursquare_id ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);
        $object->thumb_url = $data->thumb_url ?? null;
        $object->thumb_width = $data->thumb_width ?? null;
        $object->thumb_height = $data->thumb_height ?? null;

        return $object;
    }

    /**
      * Creates array of InlineQueryResultVenue objects from data.
      * @param array $data
      * @return InlineQueryResultVenue[]
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
