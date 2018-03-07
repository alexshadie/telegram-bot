<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents one shipping option.
 *
 */
class ShippingOption extends Object
{
    /**
     * Shipping option identifier
     *
     * @var string
     */
    private $id;

    /**
     * Option title
     *
     * @var string
     */
    private $title;

    /**
     * List of price portions
     *
     * @var LabeledPrice[]
     */
    private $prices;

    /**
     * Shipping option identifier
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Option title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * List of price portions
     *
     * @return LabeledPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
      * Creates ShippingOption object from data.
      * @param \stdClass $data
      * @return ShippingOption
      */
    public static function createFromObject(?\stdClass $data): ?ShippingOption
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ShippingOption();
        $object->id = $data->id;
        $object->title = $data->title;
        $object->prices = LabeledPrice::createFromObject($data->prices);
        return $object;
    }

    /**
      * Creates array of ShippingOption objects from data.
      * @param array $data
      * @return ShippingOption[]
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
