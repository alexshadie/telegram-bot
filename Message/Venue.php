<?php

namespace alexshadie\TelegramBot\message;

use alexshadie\TelegramBot\objects\Object;
use alexshadie\TelegramBot\type\Location;

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