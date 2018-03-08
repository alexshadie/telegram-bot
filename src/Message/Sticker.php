<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\PhotoSize;
use alexshadie\TelegramBot\Sticker\MaskPosition;

/**
 * This object represents a sticker.
 *
 */
class Sticker extends Object
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    private $file_id;

    /**
     * Sticker width
     *
     * @var int
     */
    private $width;

    /**
     * Sticker height
     *
     * @var int
     */
    private $height;

    /**
     * Sticker thumbnail in the .webp or .jpg format
     *
     * @var PhotoSize|null
     */
    private $thumb;

    /**
     * Emoji associated with the sticker
     *
     * @var string|null
     */
    private $emoji;

    /**
     * Name of the sticker set to which the sticker belongs
     *
     * @var string|null
     */
    private $set_name;

    /**
     * For mask stickers, the position where the mask should be placed
     *
     * @var MaskPosition|null
     */
    private $mask_position;

    /**
     * File size
     *
     * @var int|null
     */
    private $file_size;

    /**
     * Sticker constructor.
     *
     * @param string $fileId
     * @param int $width
     * @param int $height
     * @param PhotoSize|null $thumb
     * @param string|null $emoji
     * @param string|null $setName
     * @param MaskPosition|null $maskPosition
     * @param int|null $fileSize
     */
    public function __construct(string $fileId, int $width, int $height, ?PhotoSize $thumb = null, ?string $emoji = null, ?string $setName = null, ?MaskPosition $maskPosition = null, ?int $fileSize = null)
    {
        $this->file_id = $fileId;
        $this->width = $width;
        $this->height = $height;
        $this->thumb = $thumb;
        $this->emoji = $emoji;
        $this->set_name = $setName;
        $this->mask_position = $maskPosition;
        $this->file_size = $fileSize;
    }

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
     * Sticker width
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Sticker height
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Sticker thumbnail in the .webp or .jpg format
     *
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * Emoji associated with the sticker
     *
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * Name of the sticker set to which the sticker belongs
     *
     * @return string|null
     */
    public function getSetName(): ?string
    {
        return $this->set_name;
    }

    /**
     * For mask stickers, the position where the mask should be placed
     *
     * @return MaskPosition|null
     */
    public function getMaskPosition(): ?MaskPosition
    {
        return $this->mask_position;
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
      * Creates Sticker object from data.
      * @param \stdClass $data
      * @return Sticker
      */
    public static function createFromObject(?\stdClass $data): ?Sticker
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Sticker(
            $data->file_id,
            $data->width,
            $data->height
        );

        $object->thumb = PhotoSize::createFromObject($data->thumb ?? null);
        $object->emoji = $data->emoji ?? null;
        $object->set_name = $data->set_name ?? null;
        $object->mask_position = MaskPosition::createFromObject($data->mask_position ?? null);
        $object->file_size = $data->file_size ?? null;

        return $object;
    }

    /**
      * Creates array of Sticker objects from data.
      * @param array $data
      * @return Sticker[]
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
