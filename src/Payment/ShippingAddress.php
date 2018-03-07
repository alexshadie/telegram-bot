<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents a shipping address.
 *
 */
class ShippingAddress extends Object
{
    /**
     * ISO 3166-1 alpha-2 country code
     *
     * @var string
     */
    private $country_code;

    /**
     * State, if applicable
     *
     * @var string
     */
    private $state;

    /**
     * City
     *
     * @var string
     */
    private $city;

    /**
     * First line for the address
     *
     * @var string
     */
    private $street_line1;

    /**
     * Second line for the address
     *
     * @var string
     */
    private $street_line2;

    /**
     * Address post code
     *
     * @var string
     */
    private $post_code;

    /**
     * ISO 3166-1 alpha-2 country code
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * State, if applicable
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * City
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * First line for the address
     *
     * @return string
     */
    public function getStreetLine1(): string
    {
        return $this->street_line1;
    }

    /**
     * Second line for the address
     *
     * @return string
     */
    public function getStreetLine2(): string
    {
        return $this->street_line2;
    }

    /**
     * Address post code
     *
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->post_code;
    }

    /**
      * Creates ShippingAddress object from data.
      * @param \stdClass $data
      * @return ShippingAddress
      */
    public static function createFromObject(?\stdClass $data): ?ShippingAddress
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ShippingAddress();
        $object->country_code = $data->country_code;
        $object->state = $data->state;
        $object->city = $data->city;
        $object->street_line1 = $data->street_line1;
        $object->street_line2 = $data->street_line2;
        $object->post_code = $data->post_code;
        return $object;
    }

    /**
      * Creates array of ShippingAddress objects from data.
      * @param array $data
      * @return ShippingAddress[]
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
