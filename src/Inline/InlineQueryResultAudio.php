<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an mp3 audio file. By default, this audio file will be sent by the user. Alternatively, you can
 * use input_message_content to send a message with the specified content instead of the audio.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 */
class InlineQueryResultAudio extends Object
{
    /**
     * Type of the result, must be audio
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
     * A valid URL for the audio file
     *
     * @var string
     */
    private $audio_url;

    /**
     * Title
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
     * Performer
     *
     * @var string|null
     */
    private $performer;

    /**
     * Audio duration in seconds
     *
     * @var int|null
     */
    private $audio_duration;

    /**
     * Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    private $reply_markup;

    /**
     * Content of the message to be sent instead of the audio
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * InlineQueryResultAudio constructor.
     *
     * @param string $type
     * @param string $id
     * @param string $audioUrl
     * @param string $title
     * @param string|null $caption
     * @param string|null $parseMode
     * @param string|null $performer
     * @param int|null $audioDuration
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @param InputMessageContent|null $inputMessageContent
     */
    public function __construct(string $type, string $id, string $audioUrl, string $title, ?string $caption = null, ?string $parseMode = null, ?string $performer = null, ?int $audioDuration = null, ?InlineKeyboardMarkup $replyMarkup = null, ?InputMessageContent $inputMessageContent = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->audio_url = $audioUrl;
        $this->title = $title;
        $this->caption = $caption;
        $this->parse_mode = $parseMode;
        $this->performer = $performer;
        $this->audio_duration = $audioDuration;
        $this->reply_markup = $replyMarkup;
        $this->input_message_content = $inputMessageContent;
    }

    /**
     * Type of the result, must be audio
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
     * A valid URL for the audio file
     *
     * @return string
     */
    public function getAudioUrl(): string
    {
        return $this->audio_url;
    }

    /**
     * Title
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
     * Performer
     *
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * Audio duration in seconds
     *
     * @return int|null
     */
    public function getAudioDuration(): ?int
    {
        return $this->audio_duration;
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
     * Content of the message to be sent instead of the audio
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
      * Creates InlineQueryResultAudio object from data.
      * @param \stdClass $data
      * @return InlineQueryResultAudio
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultAudio
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultAudio(
            $data->type,
            $data->id,
            $data->audio_url,
            $data->title
        );

        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->performer = $data->performer ?? null;
        $object->audio_duration = $data->audio_duration ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);

        return $object;
    }

    /**
      * Creates array of InlineQueryResultAudio objects from data.
      * @param array $data
      * @return InlineQueryResultAudio[]
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
