<?php

namespace alexshadie\telegram\objects;

use alexshadie\telegram\objects\Object;
use alexshadie\telegram\type\PhotoSize;

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