<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers. By
 * default, this animated MPEG-4 file will be sent by the user with an optional caption. Alternatively, you can use
 * input_message_content to send a message with the specified content instead of the animation.
 *
 */
class InlineQueryResultCachedMpeg4Gif extends Object
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
     * A valid file identifier for the MP4 file
     *
     * @var string
     */
    private $mpeg4_file_id;

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
     * A valid file identifier for the MP4 file
     *
     * @return string
     */
    public function getMpeg4FileId(): string
    {
        return $this->mpeg4_file_id;
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
      * Creates InlineQueryResultCachedMpeg4Gif object from data.
      * @param \stdClass $data
      * @return InlineQueryResultCachedMpeg4Gif
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultCachedMpeg4Gif
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultCachedMpeg4Gif();
        $object->type = $data->type;
        $object->id = $data->id;
        $object->mpeg4_file_id = $data->mpeg4_file_id;
        $object->title = $data->title ?? null;
        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);
        return $object;
    }

    /**
      * Creates array of InlineQueryResultCachedMpeg4Gif objects from data.
      * @param array $data
      * @return InlineQueryResultCachedMpeg4Gif[]
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
