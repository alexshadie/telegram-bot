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
     * ShippingAddress constructor.
     *
     * @param string $countryCode
     * @param string $state
     * @param string $city
     * @param string $streetLine1
     * @param string $streetLine2
     * @param string $postCode
     */
    public function __construct(string $countryCode, string $state, string $city, string $streetLine1, string $streetLine2, string $postCode)
    {
        $this->country_code = $countryCode;
        $this->state = $state;
        $this->city = $city;
        $this->street_line1 = $streetLine1;
        $this->street_line2 = $streetLine2;
        $this->post_code = $postCode;
    }

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
        $object = new ShippingAddress(
            $data->country_code,
            $data->state,
            $data->city,
            $data->street_line1,
            $data->street_line2,
            $data->post_code
        );


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
