<?php

namespace alexshadie\TelegramBot\Payment;


/**
 * Stub for OrderInfo class. Use it for testing.
 */
class OrderInfoStub extends OrderInfo
{
    /**
     * @return OrderInfo
     */
    public static function getOrderInfoWithCommonFields1(): OrderInfo
    {
        return new OrderInfo(

        );
    }
    /**
     * @return OrderInfo
     */
    public static function getOrderInfoWithCommonFields2(): OrderInfo
    {
        return new OrderInfo(

        );
    }
    /**
     * @return OrderInfo
     */
    public static function getOrderInfoWithCommonFields3(): OrderInfo
    {
        return new OrderInfo(

        );
    }
    /**
     * @return OrderInfo
     */
    public static function getOrderInfoWithAllFields1(): OrderInfo
    {
        return new OrderInfo(
            'IaX1ZHFjxi',
            'gKouZY2l53',
            'dtBkjFq0Fq',
            ShippingAddressStub::getShippingAddressWithCommonFields1()
        );
    }
    /**
     * @return OrderInfo
     */
    public static function getOrderInfoWithAllFields2(): OrderInfo
    {
        return new OrderInfo(
            'NwhPQk28ap',
            'xudQyHkym2',
            '615JYrTFrb',
            ShippingAddressStub::getShippingAddressWithCommonFields1()
        );
    }
    /**
     * @return OrderInfo
     */
    public static function getOrderInfoWithAllFields3(): OrderInfo
    {
        return new OrderInfo(
            'T4Cihlhsvm',
            'ndqwh3uZTs',
            'VC94w5NLFb',
            ShippingAddressStub::getShippingAddressWithCommonFields3()
        );
    }
}
