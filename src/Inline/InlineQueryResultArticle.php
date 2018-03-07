<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an article or web page.
 *
 */
class InlineQueryResultArticle extends Object
{
    /**
     * Type of the result, must be article
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
     * Title of the result
     *
     * @var string
     */
    private $title;

    /**
     * Content of the message to be sent
     *
     * @var InputMessageContent
     */
    private $input_message_content;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * URL of the result
     *
     * @var string|null
     */
    private $url;

    /**
     * Pass True, if you don't want the URL to be shown in the message
     *
     * @var bool|null
     */
    private $hide_url;

    /**
     * Short description of the result
     *
     * @var string|null
     */
    private $description;

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
     * Type of the result, must be article
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
     * Title of the result
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Content of the message to be sent
     *
     * @return InputMessageContent
     */
    public function getInputMessageContent(): InputMessageContent
    {
        return $this->input_message_content;
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
     * URL of the result
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Pass True, if you don't want the URL to be shown in the message
     *
     * @return bool|null
     */
    public function getHideUrl(): ?bool
    {
        return $this->hide_url;
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
      * Creates InlineQueryResultArticle object from data.
      * @param \stdClass $data
      * @return InlineQueryResultArticle
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultArticle
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultArticle();
        $object->type = $data->type;
        $object->id = $data->id;
        $object->title = $data->title;
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content);
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->url = $data->url ?? null;
        $object->hide_url = $data->hide_url ?? null;
        $object->description = $data->description ?? null;
        $object->thumb_url = $data->thumb_url ?? null;
        $object->thumb_width = $data->thumb_width ?? null;
        $object->thumb_height = $data->thumb_height ?? null;
        return $object;
    }

    /**
      * Creates array of InlineQueryResultArticle objects from data.
      * @param array $data
      * @return InlineQueryResultArticle[]
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
