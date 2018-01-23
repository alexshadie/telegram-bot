<?php

namespace alexshadie\TelegramBot\type;

use alexshadie\TelegramBot\objects\Object;

/**
 * Class Location
 * Этот объект представляет точку на карте.
 * @package telegram
 */
class Location extends Object
{
    /**
     * Долгота, заданная отправителем
     * @var float
     */
    private $longitude;
    /**
     * Широта, заданная отправителем
     * @var float
     */
    private $latitude;
}