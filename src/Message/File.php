<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;

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

    public static function createFromObjectList($data)
    {
        if (is_null($data)) {
            return null;
        }
        $files = [];
        foreach ($data as $row) {
            $files[] = self::createFromObject($row);
        }
        return $files;
    }

    public static function createFromObject($data)
    {
        if (is_null($data)) {
            return null;
        }
        $file = new File();
        $file->file_id = $data->file_id;
        $file->file_size = $data->file_size ?? null;
        $file->file_path = $data->file_path ?? null;

        return $file;
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * @return null|string
     */
    public function getFilePath(): ?string
    {
        return $this->file_path;
    }
}