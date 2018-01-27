<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Type\Location;

/**
 * Class Venue
 * Этот объект представляет объект на карте.
 * @package telegram
 */
class Venue extends Object
{
    /**
     * Координаты объекта
     * @var Location
     */
    private $location;
    /**
     * Название объекта
     * @var String
     */
    private $title;
    /**
     * Адрес объекта
     * @var String
     */
    private $address;
    /**
     * Опционально. Идентификатор объекта в Foursquare
     * @var String
     */
    private $foursquare_id;
}