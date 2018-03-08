<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link
 * https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;. It is guaranteed that the link will be valid for at
 * least 1 hour. When the link expires, a new one can be requested by calling getFile.
 *
 * 
 *
 * Maximum file size to download is 20 MB
 *
 */
class File extends Object
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    private $file_id;

    /**
     * File size, if known
     *
     * @var int|null
     */
    private $file_size;

    /**
     * File path. Use https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt; to get the file.
     *
     * @var string|null
     */
    private $file_path;

    /**
     * File constructor.
     *
     * @param string $fileId
     * @param int|null $fileSize
     * @param string|null $filePath
     */
    public function __construct(string $fileId, ?int $fileSize = null, ?string $filePath = null)
    {
        $this->file_id = $fileId;
        $this->file_size = $fileSize;
        $this->file_path = $filePath;
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
     * File size, if known
     *
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * File path. Use https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt; to get the file.
     *
     * @return string|null
     */
    public function getFilePath(): ?string
    {
        return $this->file_path;
    }

    /**
      * Creates File object from data.
      * @param \stdClass $data
      * @return File
      */
    public static function createFromObject(?\stdClass $data): ?File
    {
        if (is_null($data)) {
            return null;
        }
        $object = new File(
            $data->file_id
        );

        $object->file_size = $data->file_size ?? null;
        $object->file_path = $data->file_path ?? null;

        return $object;
    }

    /**
      * Creates array of File objects from data.
      * @param array $data
      * @return File[]
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
