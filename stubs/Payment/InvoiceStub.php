<?php

namespace alexshadie\TelegramBot\Payment;


/**
 * Stub for Invoice class. Use it for testing.
 */
class InvoiceStub extends Invoice
{
    /**
     * @return Invoice
     */
    public static function getInvoiceWithCommonFields1(): Invoice
    {
        return new Invoice(
            'hzeUlNgujW',
            'Cboy4HHoxM',
            'qbrQNf3mHz',
            'C06r9SBDjn',
            524261829
        );
    }
    /**
     * @return Invoice
     */
    public static function getInvoiceWithCommonFields2(): Invoice
    {
        return new Invoice(
            'y0llmd2OM5',
            'UswDlRP9ni',
            'W4BYN4vaHc',
            'VPde5jpUeH',
            384421680
        );
    }
    /**
     * @return Invoice
     */
    public static function getInvoiceWithCommonFields3(): Invoice
    {
        return new Invoice(
            '69FXXyxtxI',
            'plnqffMW7d',
            'ycGneZGRkh',
            'E1mv5Y6aI4',
            725372578
        );
    }
    /**
     * @return Invoice
     */
    public static function getInvoiceWithAllFields1(): Invoice
    {
        return new Invoice(
            'wjAjAHFyw4',
            'RABAx4lYqS',
            'p3A2dZ6rTo',
            'DU1w3haZiv',
            300093904
        );
    }
    /**
     * @return Invoice
     */
    public static function getInvoiceWithAllFields2(): Invoice
    {
        return new Invoice(
            'S7fk0XHgJi',
            'wCMT9St0bm',
            'YKQugW4Rbt',
            't21ksBxBGK',
            1069053396
        );
    }
    /**
     * @return Invoice
     */
    public static function getInvoiceWithAllFields3(): Invoice
    {
        return new Invoice(
            'VHkFWFGnZ5',
            '67nR0B7leV',
            '9zoi5WDM1i',
            'jeKh7Ler1M',
            1857900871
        );
    }
}
