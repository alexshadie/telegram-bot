<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional
 * caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the
 * animation.
 *
 */
class InlineQueryResultGif extends Object
{
    /**
     * Type of the result, must be gif
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
     * A valid URL for the GIF file. File size must not exceed 1MB
     *
     * @var string
     */
    private $gif_url;

    /**
     * Width of the GIF
     *
     * @var int|null
     */
    private $gif_width;

    /**
     * Height of the GIF
     *
     * @var int|null
     */
    private $gif_height;

    /**
     * Duration of the GIF
     *
     * @var int|null
     */
    private $gif_duration;

    /**
     * URL of the static thumbnail for the result (jpeg or gif)
     *
     * @var string
     */
    private $thumb_url;

    /**
     * Title for the result
     *
     * @var string|null
     */
    private $title;

    /**
     * Caption of the GIF file to be sent, 0-200 characters
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
     * Content of the message to be sent instead of the GIF animation
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * InlineQueryResultGif constructor.
     *
     * @param string $type
     * @param string $id
     * @param string $gifUrl
     * @param int|null $gifWidth
     * @param int|null $gifHeight
     * @param int|null $gifDuration
     * @param string $thumbUrl
     * @param string|null $title
     * @param string|null $caption
     * @param string|null $parseMode
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     */
    public function __construct(string $type, string $id, string $gifUrl, string $thumbUrl, ?int $gifWidth = null, ?int $gifHeight = null, ?int $gifDuration = null, ?string $title = null, ?string $caption = null, ?string $parseMode = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->gif_url = $gifUrl;
        $this->gif_width = $gifWidth;
        $this->gif_height = $gifHeight;
        $this->gif_duration = $gifDuration;
        $this->thumb_url = $thumbUrl;
        $this->title = $title;
        $this->caption = $caption;
        $this->parse_mode = $parseMode;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
    }

    /**
     * Type of the result, must be gif
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
     * A valid URL for the GIF file. File size must not exceed 1MB
     *
     * @return string
     */
    public function getGifUrl(): string
    {
        return $this->gif_url;
    }

    /**
     * Width of the GIF
     *
     * @return int|null
     */
    public function getGifWidth(): ?int
    {
        return $this->gif_width;
    }

    /**
     * Height of the GIF
     *
     * @return int|null
     */
    public function getGifHeight(): ?int
    {
        return $this->gif_height;
    }

    /**
     * Duration of the GIF
     *
     * @return int|null
     */
    public function getGifDuration(): ?int
    {
        return $this->gif_duration;
    }

    /**
     * URL of the static thumbnail for the result (jpeg or gif)
     *
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumb_url;
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
     * Caption of the GIF file to be sent, 0-200 characters
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
     * Content of the message to be sent instead of the GIF animation
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
      * Creates InlineQueryResultGif object from data.
      * @param \stdClass $data
      * @return InlineQueryResultGif
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultGif
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultGif(
            $data->type,
            $data->id,
            $data->gif_url,
            $data->thumb_url
        );

        $object->gif_width = $data->gif_width ?? null;
        $object->gif_height = $data->gif_height ?? null;
        $object->gif_duration = $data->gif_duration ?? null;
        $object->title = $data->title ?? null;
        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);

        return $object;
    }

    /**
      * Creates array of InlineQueryResultGif objects from data.
      * @param array $data
      * @return InlineQueryResultGif[]
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
