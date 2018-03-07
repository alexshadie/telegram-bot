<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be
 * sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with
 * the specified content instead of the video.
 *
 * 
 *
 * If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube), you must replace its content using
 * input_message_content.
 *
 */
class InlineQueryResultVideo extends Object
{
    /**
     * Type of the result, must be video
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
     * A valid URL for the embedded video player or video file
     *
     * @var string
     */
    private $video_url;

    /**
     * Mime type of the content of video url, “text/html” or “video/mp4”
     *
     * @var string
     */
    private $mime_type;

    /**
     * URL of the thumbnail (jpeg only) for the video
     *
     * @var string
     */
    private $thumb_url;

    /**
     * Title for the result
     *
     * @var string
     */
    private $title;

    /**
     * Caption of the video to be sent, 0-200 characters
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
     * Video width
     *
     * @var int|null
     */
    private $video_width;

    /**
     * Video height
     *
     * @var int|null
     */
    private $video_height;

    /**
     * Video duration in seconds
     *
     * @var int|null
     */
    private $video_duration;

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
     * Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used to
     * send an HTML-page as a result (e.g., a YouTube video).
     *
     * @var InputMessageContent|null
     */
    private $input_message_content;

    /**
     * Type of the result, must be video
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
     * A valid URL for the embedded video player or video file
     *
     * @return string
     */
    public function getVideoUrl(): string
    {
        return $this->video_url;
    }

    /**
     * Mime type of the content of video url, “text/html” or “video/mp4”
     *
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mime_type;
    }

    /**
     * URL of the thumbnail (jpeg only) for the video
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Caption of the video to be sent, 0-200 characters
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
     * Video width
     *
     * @return int|null
     */
    public function getVideoWidth(): ?int
    {
        return $this->video_width;
    }

    /**
     * Video height
     *
     * @return int|null
     */
    public function getVideoHeight(): ?int
    {
        return $this->video_height;
    }

    /**
     * Video duration in seconds
     *
     * @return int|null
     */
    public function getVideoDuration(): ?int
    {
        return $this->video_duration;
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
     * Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used to
     * send an HTML-page as a result (e.g., a YouTube video).
     *
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->input_message_content;
    }

    /**
      * Creates InlineQueryResultVideo object from data.
      * @param \stdClass $data
      * @return InlineQueryResultVideo
      */
    public static function createFromObject(?\stdClass $data): ?InlineQueryResultVideo
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineQueryResultVideo();
        $object->type = $data->type;
        $object->id = $data->id;
        $object->video_url = $data->video_url;
        $object->mime_type = $data->mime_type;
        $object->thumb_url = $data->thumb_url;
        $object->title = $data->title;
        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->video_width = $data->video_width ?? null;
        $object->video_height = $data->video_height ?? null;
        $object->video_duration = $data->video_duration ?? null;
        $object->description = $data->description ?? null;
        $object->reply_markup = InlineKeyboardMarkup::createFromObject($data->reply_markup ?? null);
        $object->input_message_content = InputMessageContent::createFromObject($data->input_message_content ?? null);
        return $object;
    }

    /**
      * Creates array of InlineQueryResultVideo objects from data.
      * @param array $data
      * @return InlineQueryResultVideo[]
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
