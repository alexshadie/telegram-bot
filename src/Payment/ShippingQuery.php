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
     * ShippingQuery constructor.
     *
     * @param string $id
     * @param User $from
     * @param string $invoicePayload
     * @param ShippingAddress $shippingAddress
     */
    public function __construct(string $id, User $from, string $invoicePayload, ShippingAddress $shippingAddress)
    {
        $this->id = $id;
        $this->from = $from;
        $this->invoice_payload = $invoicePayload;
        $this->shipping_address = $shippingAddress;
    }

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
        $object = new ShippingQuery(
            $data->id,
            User::createFromObject($data->from),
            $data->invoice_payload,
            ShippingAddress::createFromObject($data->shipping_address)
        );


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
