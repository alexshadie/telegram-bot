<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\PhotoSize;

/**
 * Class Sticker
 * Этот объект представляет стикер.
 * @package telegram
 */
class Sticker extends Object
{
    /**
     * Уникальный идентификатор файла
     * @var string
     */
    private $file_id;
    /**
     * Ширина стикера
     * @var int
     */
    private $width;
    /**
     * Высота стикера
     * @var int
     */
    private $height;
    /**
     * Опционально. Превью стикера в формате .webp или .jpg
     * @var PhotoSize|null
     */
    private $thumb;
    /**
     * Опционально. Размер файла
     * @var int|null
     */
    private $file_size;
}