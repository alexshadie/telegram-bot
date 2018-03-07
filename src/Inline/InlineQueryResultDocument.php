<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively,
 * you can use input_message_content to send a message with the specified content instead of the file. Currently, only
 * .PDF and .ZIP files can be sent using this method.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InlineQueryResultDocument extends Object
{
    /**
     * Type of the result, must be document
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
     * Title for the result
     *
     * @var string
     */
    private $title;

    /**
     * Caption of the document to be sent, 0-200 characters
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
     * A valid URL for the file
     *
     * @var string
     */
    private $document_url;

    /**
     * Mime type of the content of the file, either “application/pdf” or “application/zip”
     *
     * @var string
     */
    private $mime_type;

    /**
     * Short description of the result
     *
     * @var string|null
     */
    private $description;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * Content of the message to be sent instead of the file
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * URL of the thumbnail (jpeg only) for the file
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
     * Type of the result, must be document
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
     * Title for the result
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Caption of the document to be sent, 0-200 characters
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
     * A valid URL for the file
     *
     * @return string
     */
    public function getDocumentUrl(): string
    {
        return $this->document_url;
    }

    /**
     * Mime type of the content of the file, either “application/pdf” or “application/zip”
     *
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mime_type;
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
     * Inline keyboard attached to the message
     *
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * Content of the message to be sent instead of the file
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
     * URL of the thumbnail (jpeg only) for the file
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
      * Creates InlineQueryResultDocument object from data.
      * @param \stdClass $data
      * @return InlineQueryResultDocument
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultDocument
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultDocument();
        $object->type = $data->type;
        $object->id = $data->id;
        $object->title = $data->title;
        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->document_url = $data->document_url;
        $object->mime_type = $data->mime_type;
        $object->description = $data->description ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);
        $object->thumb_url = $data->thumb_url ?? null;
        $object->thumb_width = $data->thumb_width ?? null;
        $object->thumb_height = $data->thumb_height ?? null;
        return $object;
    }

    /**
      * Creates array of InlineQueryResultDocument objects from data.
      * @param array $data
      * @return InlineQueryResultDocument[]
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
