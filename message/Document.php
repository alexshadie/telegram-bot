<?php

namespace alexshadie\telegram\message;

use alexshadie\telegram\objects\Object;
use alexshadie\telegram\type\PhotoSize;

/**
 * Class Document
 * Этот объект представляет файл, не являющийся фотографией, голосовым сообщением или аудиозаписью.
 * @package telegram
 */
class Document extends Object
{
    /**
     * Unique file identifier
     * @var String
     */
    private $file_id;
    /**
     * Document thumbnail as defined by sender
     * @var PhotoSize|null
     */
    private $thumb;
    /**
     * Original filename as defined by sender
     * @var string|null
     */
    private $file_name;
    /**
     * MIME файла, заданный отправителем
     * @var string|null
     */
    private $mime_type;
    /**
     * Размер файла
     * @var int|null
     */
    private $file_size;
}