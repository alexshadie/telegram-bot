<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\PhotoSize;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 *
 */
class VideoNote extends Object
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    private $file_id;

    /**
     * Video width and height as defined by sender
     *
     * @var int
     */
    private $length;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int
     */
    private $duration;

    /**
     * Video thumbnail
     *
     * @var PhotoSize|null
     */
    private $thumb;

    /**
     * File size
     *
     * @var int|null
     */
    private $file_size;

    /**
     * Unique identifier for this file
     *
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * Video width and height as defined by sender
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Video thumbnail
     *
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * File size
     *
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
      * Creates VideoNote object from data.
      * @param \stdClass $data
      * @return VideoNote
      */
    public static function createFromObject(?\stdClass $data): ?VideoNote
    {
        if (is_null($data)) {
            return null;
        }
        $object = new VideoNote();
        $object->file_id = $data->file_id;
        $object->length = $data->length;
        $object->duration = $data->duration;
        $object->thumb = PhotoSize::createFromObject($data->thumb ?? null);
        $object->file_size = $data->file_size ?? null;
        return $object;
    }

    /**
      * Creates array of VideoNote objects from data.
      * @param array $data
      * @return VideoNote[]
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
