<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object contains basic information about an invoice.
 *
 */
class Invoice extends Object
{
    /**
     * Product name
     *
     * @var string
     */
    private $title;

    /**
     * Product description
     *
     * @var string
     */
    private $description;

    /**
     * Unique bot deep-linking parameter that can be used to generate this invoice
     *
     * @var string
     */
    private $start_parameter;

    /**
     * Three-letter ISO 4217 currency code
     *
     * @var string
     */
    private $currency;

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45
     * pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for
     * each currency (2 for the majority of currencies).
     *
     * @var int
     */
    private $total_amount;

    /**
     * Invoice constructor.
     *
     * @param string $title
     * @param string $description
     * @param string $startParameter
     * @param string $currency
     * @param int $totalAmount
     */
    public function __construct(string $title, string $description, string $startParameter, string $currency, int $totalAmount)
    {
        $this->title = $title;
        $this->description = $description;
        $this->start_parameter = $startParameter;
        $this->currency = $currency;
        $this->total_amount = $totalAmount;
    }

    /**
     * Product name
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Product description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Unique bot deep-linking parameter that can be used to generate this invoice
     *
     * @return string
     */
    public function getStartParameter(): string
    {
        return $this->start_parameter;
    }

    /**
     * Three-letter ISO 4217 currency code
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45
     * pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for
     * each currency (2 for the majority of currencies).
     *
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
      * Creates Invoice object from data.
      * @param \stdClass $data
      * @return Invoice
      */
    public static function createFromObject(?\stdClass $data): ?Invoice
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Invoice(
            $data->title,
            $data->description,
            $data->start_parameter,
            $data->currency,
            $data->total_amount
        );


        return $object;
    }

    /**
      * Creates array of Invoice objects from data.
      * @param array $data
      * @return Invoice[]
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
