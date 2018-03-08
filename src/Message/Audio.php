<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 */
class Audio extends Object
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    private $file_id;

    /**
     * Duration of the audio in seconds as defined by sender
     *
     * @var int
     */
    private $duration;

    /**
     * Performer of the audio as defined by sender or by audio tags
     *
     * @var string|null
     */
    private $performer;

    /**
     * Title of the audio as defined by sender or by audio tags
     *
     * @var string|null
     */
    private $title;

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
     * Audio constructor.
     *
     * @param string $fileId
     * @param int $duration
     * @param string|null $performer
     * @param string|null $title
     * @param string|null $mimeType
     * @param int|null $fileSize
     */
    public function __construct(string $fileId, int $duration, ?string $performer = null, ?string $title = null, ?string $mimeType = null, ?int $fileSize = null)
    {
        $this->file_id = $fileId;
        $this->duration = $duration;
        $this->performer = $performer;
        $this->title = $title;
        $this->mime_type = $mimeType;
        $this->file_size = $fileSize;
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
     * Duration of the audio in seconds as defined by sender
     *
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Performer of the audio as defined by sender or by audio tags
     *
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * Title of the audio as defined by sender or by audio tags
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
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
      * Creates Audio object from data.
      * @param \stdClass $data
      * @return Audio
      */
    public static function createFromObject(?\stdClass $data): ?Audio
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Audio(
            $data->file_id,
            $data->duration
        );

        $object->performer = $data->performer ?? null;
        $object->title = $data->title ?? null;
        $object->mime_type = $data->mime_type ?? null;
        $object->file_size = $data->file_size ?? null;

        return $object;
    }

    /**
      * Creates array of Audio objects from data.
      * @param array $data
      * @return Audio[]
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
