<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can
 * use input_message_content to send a message with the specified content instead of the contact.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InlineQueryResultContact extends Object
{
    /**
     * Type of the result, must be contact
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
     * Contact's phone number
     *
     * @var string
     */
    private $phone_number;

    /**
     * Contact's first name
     *
     * @var string
     */
    private $first_name;

    /**
     * Contact's last name
     *
     * @var string|null
     */
    private $last_name;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * Content of the message to be sent instead of the contact
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
     * InlineQueryResultContact constructor.
     *
     * @param string $type
     * @param string $id
     * @param string $phoneNumber
     * @param string $firstName
     * @param string|null $lastName
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     * @param string|null $thumbUrl
     * @param int|null $thumbWidth
     * @param int|null $thumbHeight
     */
    public function __construct(string $type, string $id, string $phoneNumber, string $firstName, ?string $lastName = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null, ?string $thumbUrl = null, ?int $thumbWidth = null, ?int $thumbHeight = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->phone_number = $phoneNumber;
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
        $this->thumb_url = $thumbUrl;
        $this->thumb_width = $thumbWidth;
        $this->thumb_height = $thumbHeight;
    }

    /**
     * Type of the result, must be contact
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
     * Contact's phone number
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * Contact's first name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Contact's last name
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
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
     * Content of the message to be sent instead of the contact
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
      * Creates InlineQueryResultContact object from data.
      * @param \stdClass $data
      * @return InlineQueryResultContact
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultContact
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultContact(
            $data->type,
            $data->id,
            $data->phone_number,
            $data->first_name
        );

        $object->last_name = $data->last_name ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);
        $object->thumb_url = $data->thumb_url ?? null;
        $object->thumb_width = $data->thumb_width ?? null;
        $object->thumb_height = $data->thumb_height ?? null;

        return $object;
    }

    /**
      * Creates array of InlineQueryResultContact objects from data.
      * @param array $data
      * @return InlineQueryResultContact[]
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
