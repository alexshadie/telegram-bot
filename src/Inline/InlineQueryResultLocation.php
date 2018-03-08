<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use
 * input_message_content to send a message with the specified content instead of the location.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InlineQueryResultLocation extends Object
{
    /**
     * Type of the result, must be location
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
     * Location latitude in degrees
     *
     * @var float
     */
    private $latitude;

    /**
     * Location longitude in degrees
     *
     * @var float
     */
    private $longitude;

    /**
     * Location title
     *
     * @var string
     */
    private $title;

    /**
     * Period in seconds for which the location can be updated, should be between 60 and 86400.
     *
     * @var int|null
     */
    private $live_period;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * Content of the message to be sent instead of the location
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
     * InlineQueryResultLocation constructor.
     *
     * @param string $type
     * @param string $id
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param int|null $livePeriod
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     * @param string|null $thumbUrl
     * @param int|null $thumbWidth
     * @param int|null $thumbHeight
     */
    public function __construct(string $type, string $id, float $latitude, float $longitude, string $title, ?int $livePeriod = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null, ?string $thumbUrl = null, ?int $thumbWidth = null, ?int $thumbHeight = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->title = $title;
        $this->live_period = $livePeriod;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
        $this->thumb_url = $thumbUrl;
        $this->thumb_width = $thumbWidth;
        $this->thumb_height = $thumbHeight;
    }

    /**
     * Type of the result, must be location
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
     * Location latitude in degrees
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Location longitude in degrees
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Location title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * Inline keyboard attached to the message
     *
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * Content of the message to be sent instead of the location
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
      * Creates InlineQueryResultLocation object from data.
      * @param \stdClass $data
      * @return InlineQueryResultLocation
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultLocation
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultLocation(
            $data->type,
            $data->id,
            $data->latitude,
            $data->longitude,
            $data->title
        );

        $object->live_period = $data->live_period ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);
        $object->thumb_url = $data->thumb_url ?? null;
        $object->thumb_width = $data->thumb_width ?? null;
        $object->thumb_height = $data->thumb_height ?? null;

        return $object;
    }

    /**
      * Creates array of InlineQueryResultLocation objects from data.
      * @param array $data
      * @return InlineQueryResultLocation[]
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
