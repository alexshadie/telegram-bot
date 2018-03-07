<?php

namespace alexshadie\TelegramBot\Type;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Class PhotoSize
 * Этот объект представляет изображение определённого размера или превью файла / стикера.
 * @package telegram
 */
class PhotoSize extends Object
{
    /**
     * Уникальный идентификатор файла
     * @var string
     */
    private $file_id;
    /**
     * Photo width
     * @var int
     */
    private $width;
    /**
     * Photo height
     * @var int
     */
    private $height;
    /**
     * Опционально. Размер файла
     * @var int|null
     */
    private $file_size;

    public static function createFromObjectList($data): ?array
    {
        if (is_null($data)) {
            return null;
        }
        $photoSizes = [];
        foreach ($data as $row) {
            $photoSizes[] = self::createFromObject($row);
        }
        return $photoSizes;
    }

    public static function createFromObject(\stdClass $data)
    {
        if (is_null($data)) {
            return null;
        }
        $photoSize = new PhotoSize();
        $photoSize->file_id = $data->file_id;
        $photoSize->width = $data->width;
        $photoSize->height = $data->height;
        $photoSize->file_size = $data->file_size ?? null;

        return $photoSize;
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }
}