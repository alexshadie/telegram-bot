<?php

namespace alexshadie\telegram\message;

use alexshadie\telegram\objects\Object;

/**
 * Class Voice
 * Этот объект представляет голосовое сообщение.
 * @package telegram
 */
class Voice extends Object
{
    /**
     * Уникальный идентификатор файла
     * @var String
     */
    private $file_id;
    /**
     * Продолжительность аудиофайла, заданная отправителем
     * @var Integer
     */
    private $duration;
    /**
     * Опционально. MIME-тип файла, заданный отправителем
     * @var String
     */
    private $mime_type;
    /**
     * Опционально. Размер файла
     * @var Integer
     */
    private $file_size;
}