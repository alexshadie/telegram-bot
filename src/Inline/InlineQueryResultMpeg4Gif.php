<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file
 * will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message
 * with the specified content instead of the animation.
 *
 */
class InlineQueryResultMpeg4Gif extends Object
{
    /**
     * Type of the result, must be mpeg4_gif
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
     * A valid URL for the MP4 file. File size must not exceed 1MB
     *
     * @var string
     */
    private $mpeg4_url;

    /**
     * Video width
     *
     * @var int|null
     */
    private $mpeg4_width;

    /**
     * Video height
     *
     * @var int|null
     */
    private $mpeg4_height;

    /**
     * Video duration
     *
     * @var int|null
     */
    private $mpeg4_duration;

    /**
     * URL of the static thumbnail (jpeg or gif) for the result
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
     * Caption of the MPEG-4 file to be sent, 0-200 characters
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
     * Content of the message to be sent instead of the video animation
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * InlineQueryResultMpeg4Gif constructor.
     *
     * @param string $type
     * @param string $id
     * @param string $mpeg4Url
     * @param int|null $mpeg4Width
     * @param int|null $mpeg4Height
     * @param int|null $mpeg4Duration
     * @param string $thumbUrl
     * @param string|null $title
     * @param string|null $caption
     * @param string|null $parseMode
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     */
    public function __construct(string $type, string $id, string $mpeg4Url, string $thumbUrl, ?int $mpeg4Width = null, ?int $mpeg4Height = null, ?int $mpeg4Duration = null, ?string $title = null, ?string $caption = null, ?string $parseMode = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->mpeg4_url = $mpeg4Url;
        $this->mpeg4_width = $mpeg4Width;
        $this->mpeg4_height = $mpeg4Height;
        $this->mpeg4_duration = $mpeg4Duration;
        $this->thumb_url = $thumbUrl;
        $this->title = $title;
        $this->caption = $caption;
        $this->parse_mode = $parseMode;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
    }

    /**
     * Type of the result, must be mpeg4_gif
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
     * A valid URL for the MP4 file. File size must not exceed 1MB
     *
     * @return string
     */
    public function getMpeg4Url(): string
    {
        return $this->mpeg4_url;
    }

    /**
     * Video width
     *
     * @return int|null
     */
    public function getMpeg4Width(): ?int
    {
        return $this->mpeg4_width;
    }

    /**
     * Video height
     *
     * @return int|null
     */
    public function getMpeg4Height(): ?int
    {
        return $this->mpeg4_height;
    }

    /**
     * Video duration
     *
     * @return int|null
     */
    public function getMpeg4Duration(): ?int
    {
        return $this->mpeg4_duration;
    }

    /**
     * URL of the static thumbnail (jpeg or gif) for the result
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
     * Caption of the MPEG-4 file to be sent, 0-200 characters
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
     * Content of the message to be sent instead of the video animation
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
      * Creates InlineQueryResultMpeg4Gif object from data.
      * @param \stdClass $data
      * @return InlineQueryResultMpeg4Gif
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultMpeg4Gif
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultMpeg4Gif(
            $data->type,
            $data->id,
            $data->mpeg4_url,
            $data->thumb_url
        );

        $object->mpeg4_width = $data->mpeg4_width ?? null;
        $object->mpeg4_height = $data->mpeg4_height ?? null;
        $object->mpeg4_duration = $data->mpeg4_duration ?? null;
        $object->title = $data->title ?? null;
        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);

        return $object;
    }

    /**
      * Creates array of InlineQueryResultMpeg4Gif objects from data.
      * @param array $data
      * @return InlineQueryResultMpeg4Gif[]
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
