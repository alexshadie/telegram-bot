<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively,
 * you can use input_message_content to send a message with the specified content instead of the photo.
 *
 */
class InlineQueryResultPhoto extends Object
{
    /**
     * Type of the result, must be photo
     *
     * @var string
     */
    private $type;

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @var string
     */
    private $id;

    /**
     * A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
     *
     * @var string
     */
    private $photo_url;

    /**
     * URL of the thumbnail for the photo
     *
     * @var string
     */
    private $thumb_url;

    /**
     * Width of the photo
     *
     * @var int|null
     */
    private $photo_width;

    /**
     * Height of the photo
     *
     * @var int|null
     */
    private $photo_height;

    /**
     * Title for the result
     *
     * @var string|null
     */
    private $title;

    /**
     * Short description of the result
     *
     * @var string|null
     */
    private $description;

    /**
     * Caption of the photo to be sent, 0-200 characters
     *
     * @var string|null
     */
    private $caption;

    /**
     * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media
     * caption.
     *
     * @var string|null
     */
    private $parse_mode;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * Content of the message to be sent instead of the photo
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * InlineQueryResultPhoto constructor.
     *
     * @param string $type
     * @param string $id
     * @param string $photoUrl
     * @param string $thumbUrl
     * @param int|null $photoWidth
     * @param int|null $photoHeight
     * @param string|null $title
     * @param string|null $description
     * @param string|null $caption
     * @param string|null $parseMode
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     */
    public function __construct(string $type, string $id, string $photoUrl, string $thumbUrl, ?int $photoWidth = null, ?int $photoHeight = null, ?string $title = null, ?string $description = null, ?string $caption = null, ?string $parseMode = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->photo_url = $photoUrl;
        $this->thumb_url = $thumbUrl;
        $this->photo_width = $photoWidth;
        $this->photo_height = $photoHeight;
        $this->title = $title;
        $this->description = $description;
        $this->caption = $caption;
        $this->parse_mode = $parseMode;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
    }

    /**
     * Type of the result, must be photo
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
     *
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photo_url;
    }

    /**
     * URL of the thumbnail for the photo
     *
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumb_url;
    }

    /**
     * Width of the photo
     *
     * @return int|null
     */
    public function getPhotoWidth(): ?int
    {
        return $this->photo_width;
    }

    /**
     * Height of the photo
     *
     * @return int|null
     */
    public function getPhotoHeight(): ?int
    {
        return $this->photo_height;
    }

    /**
     * Title for the result
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Short description of the result
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Caption of the photo to be sent, 0-200 characters
     *
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media
     * caption.
     *
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parse_mode;
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
     * Content of the message to be sent instead of the photo
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
      * Creates InlineQueryResultPhoto object from data.
      * @param \stdClass $data
      * @return InlineQueryResultPhoto
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultPhoto
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultPhoto(
            $data->type,
            $data->id,
            $data->photo_url,
            $data->thumb_url
        );

        $object->photo_width = $data->photo_width ?? null;
        $object->photo_height = $data->photo_height ?? null;
        $object->title = $data->title ?? null;
        $object->description = $data->description ?? null;
        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);

        return $object;
    }

    /**
      * Creates array of InlineQueryResultPhoto objects from data.
      * @param array $data
      * @return InlineQueryResultPhoto[]
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
