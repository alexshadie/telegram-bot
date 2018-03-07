<?php

namespace alexshadie\TelegramBot\Objects;

use alexshadie\TelegramBot\Type\PhotoSize;

/**
 * This object represent a user's profile pictures.
 *
 */
class UserProfilePhotos extends Object
{
    /**
     * Total number of profile pictures the target user has
     *
     * @var int
     */
    private $total_count;

    /**
     * Requested profile pictures (in up to 4 sizes each)
     *
     * @var PhotoSize[]
     */
    private $photos;

    /**
     * Total number of profile pictures the target user has
     *
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * Requested profile pictures (in up to 4 sizes each)
     *
     * @return PhotoSize[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
      * Creates UserProfilePhotos object from data.
      * @param \stdClass $data
      * @return UserProfilePhotos
      */
    public static function createFromObject(?\stdClass $data): ?UserProfilePhotos
    {
        if (is_null($data)) {
            return null;
        }
        $object = new UserProfilePhotos();
        $object->total_count = $data->total_count;
        $object->photos = PhotoSize::createFromObject($data->photos);
        return $object;
    }

    /**
      * Creates array of UserProfilePhotos objects from data.
      * @param array $data
      * @return UserProfilePhotos[]
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
