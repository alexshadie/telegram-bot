<?php

namespace alexshadie\TelegramBot\Sticker;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Message\Sticker;

/**
 * This object represents a sticker set.
 *
 */
class StickerSet extends Object
{
    /**
     * Sticker set name
     *
     * @var string
     */
    private $name;

    /**
     * Sticker set title
     *
     * @var string
     */
    private $title;

    /**
     * True, if the sticker set contains masks
     *
     * @var bool
     */
    private $contains_masks;

    /**
     * List of all set stickers
     *
     * @var Sticker[]
     */
    private $stickers;

    /**
     * Sticker set name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sticker set title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * True, if the sticker set contains masks
     *
     * @return bool
     */
    public function getContainsMasks(): bool
    {
        return $this->contains_masks;
    }

    /**
     * List of all set stickers
     *
     * @return Sticker[]
     */
    public function getStickers(): array
    {
        return $this->stickers;
    }

    /**
      * Creates StickerSet object from data.
      * @param \stdClass $data
      * @return StickerSet
      */
    public static function createFromObject(?\stdClass $data): ?StickerSet
    {
        if (is_null($data)) {
            return null;
        }
        $object = new StickerSet();
        $object->name = $data->name;
        $object->title = $data->title;
        $object->contains_masks = $data->contains_masks;
        $object->stickers = Sticker::createFromObject($data->stickers);
        return $object;
    }

    /**
      * Creates array of StickerSet objects from data.
      * @param array $data
      * @return StickerSet[]
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
