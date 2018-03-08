<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object contains basic information about a successful payment.
 *
 */
class SuccessfulPayment extends Object
{
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
     * Bot specified invoice payload
     *
     * @var string
     */
    private $invoice_payload;

    /**
     * Identifier of the shipping option chosen by the user
     *
     * @var string|null
     */
    private $shipping_option_id;

    /**
     * Order info provided by the user
     *
     * @var OrderInfo|null
     */
    private $order_info;

    /**
     * Telegram payment identifier
     *
     * @var string
     */
    private $telegram_payment_charge_id;

    /**
     * Provider payment identifier
     *
     * @var string
     */
    private $provider_payment_charge_id;

    /**
     * SuccessfulPayment constructor.
     *
     * @param string $currency
     * @param int $totalAmount
     * @param string $invoicePayload
     * @param string|null $shippingOptionId
     * @param OrderInfo|null $orderInfo
     * @param string $telegramPaymentChargeId
     * @param string $providerPaymentChargeId
     */
    public function __construct(string $currency, int $totalAmount, string $invoicePayload, string $telegramPaymentChargeId, string $providerPaymentChargeId, ?string $shippingOptionId = null, ?OrderInfo $orderInfo = null)
    {
        $this->currency = $currency;
        $this->total_amount = $totalAmount;
        $this->invoice_payload = $invoicePayload;
        $this->shipping_option_id = $shippingOptionId;
        $this->order_info = $orderInfo;
        $this->telegram_payment_charge_id = $telegramPaymentChargeId;
        $this->provider_payment_charge_id = $providerPaymentChargeId;
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
     * Bot specified invoice payload
     *
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * Identifier of the shipping option chosen by the user
     *
     * @return string|null
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shipping_option_id;
    }

    /**
     * Order info provided by the user
     *
     * @return OrderInfo|null
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->order_info;
    }

    /**
     * Telegram payment identifier
     *
     * @return string
     */
    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    /**
     * Provider payment identifier
     *
     * @return string
     */
    public function getProviderPaymentChargeId(): string
    {
        return $this->provider_payment_charge_id;
    }

    /**
      * Creates SuccessfulPayment object from data.
      * @param \stdClass $data
      * @return SuccessfulPayment
      */
    public static function createFromObject(?\stdClass $data): ?SuccessfulPayment
    {
        if (is_null($data)) {
            return null;
        }
        $object = new SuccessfulPayment(
            $data->currency,
            $data->total_amount,
            $data->invoice_payload,
            $data->telegram_payment_charge_id,
            $data->provider_payment_charge_id
        );

        $object->shipping_option_id = $data->shipping_option_id ?? null;
        $object->order_info = OrderInfo::createFromObject($data->order_info ?? null);

        return $object;
    }

    /**
      * Creates array of SuccessfulPayment objects from data.
      * @param array $data
      * @return SuccessfulPayment[]
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
