<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents information about an order.
 *
 */
class OrderInfo extends Object
{
    /**
     * User name
     *
     * @var string|null
     */
    private $name;

    /**
     * User's phone number
     *
     * @var string|null
     */
    private $phone_number;

    /**
     * User email
     *
     * @var string|null
     */
    private $email;

    /**
     * User shipping address
     *
     * @var ShippingAddress|null
     */
    private $shipping_address;

    /**
     * User name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * User's phone number
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    /**
     * User email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * User shipping address
     *
     * @return ShippingAddress|null
     */
    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shipping_address;
    }

    /**
      * Creates OrderInfo object from data.
      * @param \stdClass $data
      * @return OrderInfo
      */
    public static function createFromObject(?\stdClass $data): ?OrderInfo
    {
        if (is_null($data)) {
            return null;
        }
        $object = new OrderInfo();
        $object->name = $data->name ?? null;
        $object->phone_number = $data->phone_number ?? null;
        $object->email = $data->email ?? null;
        $object->shipping_address = ShippingAddress::createFromObject($data->shipping_address ?? null);
        return $object;
    }

    /**
      * Creates array of OrderInfo objects from data.
      * @param array $data
      * @return OrderInfo[]
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
