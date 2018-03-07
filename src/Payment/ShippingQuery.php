<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;

/**
 * This object contains information about an incoming shipping query.
 *
 */
class ShippingQuery extends Object
{
    /**
     * Unique query identifier
     *
     * @var string
     */
    private $id;

    /**
     * User who sent the query
     *
     * @var User
     */
    private $from;

    /**
     * Bot specified invoice payload
     *
     * @var string
     */
    private $invoice_payload;

    /**
     * User specified shipping address
     *
     * @var ShippingAddress
     */
    private $shipping_address;

    /**
     * Unique query identifier
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * User who sent the query
     *
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * Bot specified invoice payload
     *
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * User specified shipping address
     *
     * @return ShippingAddress
     */
    public function getShippingAddress(): ShippingAddress
    {
        return $this->shipping_address;
    }

    /**
      * Creates ShippingQuery object from data.
      * @param \stdClass $data
      * @return ShippingQuery
      */
    public static function createFromObject(?\stdClass $data): ?ShippingQuery
    {
        if (is_null($data)) {
            return null;
        }
        $object = new ShippingQuery();
        $object->id = $data->id;
        $object->from = User::createFromObject($data->from);
        $object->invoice_payload = $data->invoice_payload;
        $object->shipping_address = ShippingAddress::createFromObject($data->shipping_address);
        return $object;
    }

    /**
      * Creates array of ShippingQuery objects from data.
      * @param array $data
      * @return ShippingQuery[]
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
