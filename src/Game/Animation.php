<?php

namespace alexshadie\TelegramBot\Game;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\PhotoSize;

/**
 * You can provide an animation for your game so that it looks stylish in chats (check out Lumberjack for an example).
 * This object represents an animation file to be displayed in the message containing a game.
 *
 */
class Animation extends Object
{
    /**
     * Unique file identifier
     *
     * @var string
     */
    private $file_id;

    /**
     * Animation thumbnail as defined by sender
     *
     * @var PhotoSize|null
     */
    private $thumb;

    /**
     * Original animation filename as defined by sender
     *
     * @var string|null
     */
    private $file_name;

    /**
     * MIME type of the file as defined by sender
     *
     * @var string|null
     */
    private $mime_type;

    /**
     * File size
     *
     * @var int|null
     */
    private $file_size;

    /**
     * Animation constructor.
     *
     * @param string $fileId
     * @param PhotoSize|null $thumb
     * @param string|null $fileName
     * @param string|null $mimeType
     * @param int|null $fileSize
     */
    public function __construct(string $fileId, ?PhotoSize $thumb = null, ?string $fileName = null, ?string $mimeType = null, ?int $fileSize = null)
    {
        $this->file_id = $fileId;
        $this->thumb = $thumb;
        $this->file_name = $fileName;
        $this->mime_type = $mimeType;
        $this->file_size = $fileSize;
    }

    /**
     * Unique file identifier
     *
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * Animation thumbnail as defined by sender
     *
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    /**
     * Original animation filename as defined by sender
     *
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    /**
     * MIME type of the file as defined by sender
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    /**
     * File size
     *
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
      * Creates Animation object from data.
      * @param \stdClass $data
      * @return Animation
      */
    public static function createFromObject(?\stdClass $data): ?Animation
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Animation(
            $data->file_id
        );

        $object->thumb = PhotoSize::createFromObject($data->thumb ?? null);
        $object->file_name = $data->file_name ?? null;
        $object->mime_type = $data->mime_type ?? null;
        $object->file_size = $data->file_size ?? null;

        return $object;
    }

    /**
      * Creates array of Animation objects from data.
      * @param array $data
      * @return Animation[]
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
