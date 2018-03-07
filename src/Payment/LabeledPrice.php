<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents a portion of the price for goods or services.
 *
 */
class LabeledPrice extends Object
{
    /**
     * Portion label
     *
     * @var string
     */
    private $label;

    /**
     * Price of the product in the smallest units of the currency (integer, not float/double). For example, for a price of
     * US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     * point for each currency (2 for the majority of currencies).
     *
     * @var int
     */
    private $amount;

    /**
     * Portion label
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Price of the product in the smallest units of the currency (integer, not float/double). For example, for a price of
     * US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     * point for each currency (2 for the majority of currencies).
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
      * Creates LabeledPrice object from data.
      * @param \stdClass $data
      * @return LabeledPrice
      */
    public static function createFromObject(?\stdClass $data): ?LabeledPrice
    {
        if (is_null($data)) {
            return null;
        }
        $object = new LabeledPrice();
        $object->label = $data->label;
        $object->amount = $data->amount;
        return $object;
    }

    /**
      * Creates array of LabeledPrice objects from data.
      * @param array $data
      * @return LabeledPrice[]
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
