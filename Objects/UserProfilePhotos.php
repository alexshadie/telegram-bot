<?php

namespace alexshadie\TelegramBot\objects;

use alexshadie\TelegramBot\objects\Object;
use alexshadie\TelegramBot\type\PhotoSize;

/**
 * Class UserProfilePhotos
 * Этот объект содержит фотографии профиля пользователя.
 * @package telegram
 */
class UserProfilePhotos extends Object
{
    /**
     * Общее число доступных фотографий профиля
     * @var int
     */
    private $total_count;
    /**
     * Запрошенные изображения, каждое в 4 разных размерах.
     * @var PhotoSize[][]
     */
    private $photos;
}