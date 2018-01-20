<?php

namespace alexshadie\telegram\message;

use alexshadie\telegram\objects\Object;

/**
 * Class File
 * Этот объект представляет файл, готовый к загрузке. Он может быть скачан по ссылке
 * вида https://api.telegram.org/file/bot<token>/<file_path>. Ссылка будет действительна как
 * минимум в течение 1 часа. По истечении этого срока она может быть запрошена заново с помощью метода getFile.
 * @package telegram
 */
class File extends Object
{
    /**
     * Уникальный идентификатор файла
     * @var string
     */
    private $file_id;
    /**
     * Опционально. Размер файла, если известен
     * @var int|null
     */
    private $file_size;
    /**
     * Опционально. Расположение файла. Для скачивания воспользуйтейсь ссылкой вида
     * https://api.telegram.org/file/bot<token>/<file_path>
     * @var string|null
     */
    private $file_path;
}