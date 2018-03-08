<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\UserStub;

/**
 * Stub for ShippingQuery class. Use it for testing.
 */
class ShippingQueryStub extends ShippingQuery
{
    /**
     * @return ShippingQuery
     */
    public static function getShippingQueryWithCommonFields1(): ShippingQuery
    {
        return new ShippingQuery(
            '9qVkCnYkQZ',
            UserStub::getUserWithCommonFields3(),
            'Y4xDGz940R',
            ShippingAddressStub::getShippingAddressWithCommonFields3()
        );
    }
    /**
     * @return ShippingQuery
     */
    public static function getShippingQueryWithCommonFields2(): ShippingQuery
    {
        return new ShippingQuery(
            'nxRjtfVmxn',
            UserStub::getUserWithCommonFields3(),
            'RQyzJac3eK',
            ShippingAddressStub::getShippingAddressWithCommonFields1()
        );
    }
    /**
     * @return ShippingQuery
     */
    public static function getShippingQueryWithCommonFields3(): ShippingQuery
    {
        return new ShippingQuery(
            'RYSleoUup7',
            UserStub::getUserWithCommonFields1(),
            'RApatra2RJ',
            ShippingAddressStub::getShippingAddressWithCommonFields2()
        );
    }
    /**
     * @return ShippingQuery
     */
    public static function getShippingQueryWithAllFields1(): ShippingQuery
    {
        return new ShippingQuery(
            'Jc0n2urdtu',
            UserStub::getUserWithCommonFields2(),
            'BTTLAUZf27',
            ShippingAddressStub::getShippingAddressWithCommonFields3()
        );
    }
    /**
     * @return ShippingQuery
     */
    public static function getShippingQueryWithAllFields2(): ShippingQuery
    {
        return new ShippingQuery(
            'ho8pUtqnTF',
            UserStub::getUserWithCommonFields3(),
            'L8f5DllUN9',
            ShippingAddressStub::getShippingAddressWithCommonFields3()
        );
    }
    /**
     * @return ShippingQuery
     */
    public static function getShippingQueryWithAllFields3(): ShippingQuery
    {
        return new ShippingQuery(
            'sb2u444HM0',
            UserStub::getUserWithCommonFields1(),
            'TvnCmUMpfV',
            ShippingAddressStub::getShippingAddressWithCommonFields3()
        );
    }
}
