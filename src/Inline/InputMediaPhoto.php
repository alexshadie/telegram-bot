<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Represents a photo to be sent.
 *
 */
class InputMediaPhoto extends Object
{
    /**
     * Type of the result, must be photo
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
     * Caption of the photo to be sent, 0-200 characters
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
     * InputMediaPhoto constructor.
     *
     * @param string $type
     * @param string $media
     * @param string|null $caption
     * @param string|null $parseMode
     */
    public function __construct(string $type, string $media, ?string $caption = null, ?string $parseMode = null)
    {
        $this->type = $type;
        $this->media = $media;
        $this->caption = $caption;
        $this->parse_mode = $parseMode;
    }

    /**
     * Type of the result, must be photo
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
     * Caption of the photo to be sent, 0-200 characters
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
      * Creates InputMediaPhoto object from data.
      * @param \stdClass $data
      * @return InputMediaPhoto
      */
    public static function createFromObject(?\stdClass $data): ?InputMediaPhoto
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputMediaPhoto(
            $data->type,
            $data->media
        );

        $object->caption = $data->caption ?? null;
        $object->parse_mode = $data->parse_mode ?? null;

        return $object;
    }

    /**
      * Creates array of InputMediaPhoto objects from data.
      * @param array $data
      * @return InputMediaPhoto[]
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
