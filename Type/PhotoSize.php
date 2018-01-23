<?php

namespace alexshadie\TelegramBot\type;

use alexshadie\TelegramBot\objects\Object;

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
}