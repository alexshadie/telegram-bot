<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Represents a video to be sent.
 *
 */
class InputMediaVideo extends Object
{
    /**
     * Type of the result, must be video
     *
     * @var string
     */
    private $type;

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for
     * Telegram to get a file from the Internet, or pass "attach://&lt;file_attach_name&gt;" to upload a new one using
     * multipart/form-data under &lt;file_attach_name&gt; name. More info on Sending Files »
     *
     * @var string
     */
    private $media;

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
    private $width;

    /**
     * Video height
     *
     * @var int|null
     */
    private $height;

    /**
     * Video duration
     *
     * @var int|null
     */
    private $duration;

    /**
     * Pass True, if the uploaded video is suitable for streaming
     *
     * @var bool|null
     */
    private $supports_streaming;

    /**
     * InputMediaVideo constructor.
     *
     * @param string $type
     * @param string $media
     * @param string|null $caption
     * @param string|null $parseMode
     * @param int|null $width
     * @param int|null $height
     * @param int|null $duration
     * @param bool|null $supportsStreaming
     */
    public function __construct(string $type, string $media, ?string $caption = null, ?string $parseMode = null, ?int $width = null, ?int $height = null, ?int $duration = null, ?bool $supportsStreaming = null)
    {
        $this->type = $type;
        $this->media = $media;
        $this->caption = $caption;
        $this->parse_mode = $parseMode;
        $this->width = $width;
        $this->height = $height;
        $this->duration = $duration;
        $this->supports_streaming = $supportsStreaming;
    }

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
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for
     * Telegram to get a file from the Internet, or pass "attach://&lt;file_attach_name&gt;" to upload a new one using
     * multipart/form-data under &lt;file_attach_name&gt; name. More info on Sending Files »
     *
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
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
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Video height
     *
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * Video duration
     *
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * Pass True, if the uploaded video is suitable for streaming
     *
     * @return bool|null
     */
    public function getSupportsStreaming(): ?bool
    {
        return $this->supports_streaming;
    }

    /**
      * Creates InputMediaVideo object from data.
      * @param \stdClass $data
      * @return InputMediaVideo
      */
    public static function createFromObject(?\stdClass $data): ?InputMediaVideo
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputMediaVideo(
            $data->type,
            $data->media
        );

        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;
        $object->width = $data->width ?? null;
        $object->height = $data->height ?? null;
        $object->duration = $data->duration ?? null;
        $object->supports_streaming = $data->supports_streaming ?? null;

        return $object;
    }

    /**
      * Creates array of InputMediaVideo objects from data.
      * @param array $data
      * @return InputMediaVideo[]
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
