<?php

namespace alexshadie\TelegramBot\Type;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 */
class PhotoSize extends Object
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    private $file_id;

    /**
     * Photo width
     *
     * @var int
     */
    private $width;

    /**
     * Photo height
     *
     * @var int
     */
    private $height;

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
     * Photo width
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Photo height
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
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
      * Creates PhotoSize object from data.
      * @param \stdClass $data
      * @return PhotoSize
      */
    public static function createFromObject(?\stdClass $data): ?PhotoSize
    {
        if (is_null($data)) {
            return null;
        }
        $object = new PhotoSize();
        $object->file_id = $data->file_id;
        $object->width = $data->width;
        $object->height = $data->height;
        $object->file_size = $data->file_size ?? null;
        return $object;
    }

    /**
      * Creates array of PhotoSize objects from data.
      * @param array $data
      * @return PhotoSize[]
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
