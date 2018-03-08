<?php

namespace alexshadie\TelegramBot\Payment;


/**
 * Stub for ShippingAddress class. Use it for testing.
 */
class ShippingAddressStub extends ShippingAddress
{
    /**
     * @return ShippingAddress
     */
    public static function getShippingAddressWithCommonFields1(): ShippingAddress
    {
        return new ShippingAddress(
            '2y3XTkI4j9',
            '3xsx82jJz2',
            'wTQg5HDaNA',
            'qyXmPgznMj',
            'jCLTmx5VR8',
            'FUXYiwBnls'
        );
    }
    /**
     * @return ShippingAddress
     */
    public static function getShippingAddressWithCommonFields2(): ShippingAddress
    {
        return new ShippingAddress(
            'DB8ddEuhaI',
            '6Jdxm7bMC4',
            'ffJyvgCpSh',
            'ABANJDW2yA',
            '0RuPFRsyhy',
            'CTtJRDSfsP'
        );
    }
    /**
     * @return ShippingAddress
     */
    public static function getShippingAddressWithCommonFields3(): ShippingAddress
    {
        return new ShippingAddress(
            'UWi7scraHK',
            'SJ8JfEtF7m',
            'hYfdQ0IBuf',
            '06bbih88Og',
            'h17QXuXeaL',
            'ooCVpljAew'
        );
    }
    /**
     * @return ShippingAddress
     */
    public static function getShippingAddressWithAllFields1(): ShippingAddress
    {
        return new ShippingAddress(
            '5MKQgN4YiZ',
            'GBhpVTiJAy',
            'ZZbqioum9G',
            'r3HFGacXZG',
            'Oe3KqBVbRV',
            'LCBAQRS8DT'
        );
    }
    /**
     * @return ShippingAddress
     */
    public static function getShippingAddressWithAllFields2(): ShippingAddress
    {
        return new ShippingAddress(
            'n5PH7XGk5X',
            'LxrbrzZ4pc',
            'oELyGYDSci',
            'JDyKMOYTXx',
            '4KmGWEZBuQ',
            'XkmCXoKln8'
        );
    }
    /**
     * @return ShippingAddress
     */
    public static function getShippingAddressWithAllFields3(): ShippingAddress
    {
        return new ShippingAddress(
            'Ybp5rWlniu',
            'lsm7H0R7nQ',
            'olk7gOEzV0',
            'hbdPJf6al7',
            'W4WVUztrXZ',
            'obWQkaE9Ua'
        );
    }
}
