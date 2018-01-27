<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\PhotoSize;

/**
 * Class Video
 * Этот объект представляет видеозапись.
 * @package telegram
 */
class Video extends Object
{
    /**
     * Уникальный идентификатор файла
     * @var string
     */
    private $file_id;
    /**
     * Ширина видео, заданная отправителем
     * @var int
     */
    private $width;
    /**
     * Высота видео, заданная отправителем
     * @var int
     */
    private $height;
    /**
     * Продолжительность видео, заданная отправителем
     * @var int
     */
    private $duration;
    /**
     * Опционально. Превью видео
     * @var PhotoSize|null
     */
    private $thumb;
    /**
     * Опционально. MIME файла, заданный отправителем
     * @var string|null
     */
    private $mime_type;
    /**
     * Опционально. Размер файла
     * @var int|null
     */
    private $file_size;
}