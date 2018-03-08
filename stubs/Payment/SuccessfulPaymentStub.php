<?php

namespace alexshadie\TelegramBot\Payment;


/**
 * Stub for SuccessfulPayment class. Use it for testing.
 */
class SuccessfulPaymentStub extends SuccessfulPayment
{
    /**
     * @return SuccessfulPayment
     */
    public static function getSuccessfulPaymentWithCommonFields1(): SuccessfulPayment
    {
        return new SuccessfulPayment(
            'f44NFVDXG9',
            1013519057,
            'zYFEWn4VIs',
            'povIsDx1j2',
            'ny6DyZNUEJ'
        );
    }
    /**
     * @return SuccessfulPayment
     */
    public static function getSuccessfulPaymentWithCommonFields2(): SuccessfulPayment
    {
        return new SuccessfulPayment(
            '7wEB8C2Rqu',
            1765623735,
            '1n3NV8Aad1',
            '0V6wI24Yjb',
            'K2FibaJi9t'
        );
    }
    /**
     * @return SuccessfulPayment
     */
    public static function getSuccessfulPaymentWithCommonFields3(): SuccessfulPayment
    {
        return new SuccessfulPayment(
            'hP4HXbCuPY',
            197278455,
            'hrSWy9CMIm',
            'QxV4lw7qYf',
            'igTkEiEkL3'
        );
    }
    /**
     * @return SuccessfulPayment
     */
    public static function getSuccessfulPaymentWithAllFields1(): SuccessfulPayment
    {
        return new SuccessfulPayment(
            'odGsIohWLK',
            1768470035,
            'kx9iJ0CebU',
            'ZYKjrrdR7Q',
            '5VeQIqnO68',
            'ytUF6E0eVy',
            OrderInfoStub::getOrderInfoWithCommonFields3()
        );
    }
    /**
     * @return SuccessfulPayment
     */
    public static function getSuccessfulPaymentWithAllFields2(): SuccessfulPayment
    {
        return new SuccessfulPayment(
            'cHNMEwaAKL',
            1308041725,
            'DpVyV68YsS',
            'ohOpgDGIXQ',
            'J0RxSd1gen',
            '8ESWrmv1U5',
            OrderInfoStub::getOrderInfoWithCommonFields3()
        );
    }
    /**
     * @return SuccessfulPayment
     */
    public static function getSuccessfulPaymentWithAllFields3(): SuccessfulPayment
    {
        return new SuccessfulPayment(
            'MQKcAJJ1rr',
            320677479,
            'jay8EdbB2X',
            'Q8KDs01TXR',
            'dUkTjnBTWd',
            'AlHOI9Uz4Z',
            OrderInfoStub::getOrderInfoWithCommonFields1()
        );
    }
}
