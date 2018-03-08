<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a voice recording in an .ogg container encoded with OPUS. By default, this voice recording will
 * be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content
 * instead of the the voice message.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InlineQueryResultVoice extends Object
{
    /**
     * Type of the result, must be voice
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
     * A valid URL for the voice recording
     *
     * @var string
     */
    private $voice_url;

    /**
     * Recording title
     *
     * @var string
     */
    private $title;

    /**
     * Caption, 0-200 characters
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
     * Recording duration in seconds
     *
     * @var int|null
     */
    private $voice_duration;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * Content of the message to be sent instead of the voice recording
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * InlineQueryResultVoice constructor.
     *
     * @param string $type
     * @param string $id
     * @param string $voiceUrl
     * @param string $title
     * @param string|null $caption
     * @param string|null $parseMode
     * @param int|null $voiceDuration
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     */
    public function __construct(string $type, string $id, string $voiceUrl, string $title, ?string $caption = null, ?string $parseMode = null, ?int $voiceDuration = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->voice_url = $voiceUrl;
        $this->title = $title;
        $this->caption = $caption;
        $this->parse_mode = $parseMode;
        $this->voice_duration = $voiceDuration;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
    }

    /**
     * Type of the result, must be voice
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
     * A valid URL for the voice recording
     *
     * @return string
     */
    public function getVoiceUrl(): string
    {
        return $this->voice_url;
    }

    /**
     * Recording title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Caption, 0-200 characters
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
     * Recording duration in seconds
     *
     * @return int|null
     */
    public function getVoiceDuration(): ?int
    {
        return $this->voice_duration;
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
     * Content of the message to be sent instead of the voice recording
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
      * Creates InlineQueryResultVoice object from data.
      * @param \stdClass $data
      * @return InlineQueryResultVoice
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultVoice
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultVoice(
            $data->type,
            $data->id,
            $data->voice_url,
            $data->title
        );

        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->voice_duration = $data->voice_duration ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);

        return $object;
    }

    /**
      * Creates array of InlineQueryResultVoice objects from data.
      * @param array $data
      * @return InlineQueryResultVoice[]
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
