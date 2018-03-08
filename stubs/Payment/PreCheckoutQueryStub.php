<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\UserStub;

/**
 * Stub for PreCheckoutQuery class. Use it for testing.
 */
class PreCheckoutQueryStub extends PreCheckoutQuery
{
    /**
     * @return PreCheckoutQuery
     */
    public static function getPreCheckoutQueryWithCommonFields1(): PreCheckoutQuery
    {
        return new PreCheckoutQuery(
            'n7ZltdpzLh',
            UserStub::getUserWithCommonFields2(),
            '9vm9l6EsZj',
            1675007780,
            'fVzJUv70Y3'
        );
    }
    /**
     * @return PreCheckoutQuery
     */
    public static function getPreCheckoutQueryWithCommonFields2(): PreCheckoutQuery
    {
        return new PreCheckoutQuery(
            'Bl2lM6bFeE',
            UserStub::getUserWithCommonFields3(),
            'f6re50Tu96',
            770271457,
            'QIISEdSUtp'
        );
    }
    /**
     * @return PreCheckoutQuery
     */
    public static function getPreCheckoutQueryWithCommonFields3(): PreCheckoutQuery
    {
        return new PreCheckoutQuery(
            'V8ponpTg04',
            UserStub::getUserWithCommonFields3(),
            'M3v9VJJBJd',
            1670314928,
            'FCNG0vCfH9'
        );
    }
    /**
     * @return PreCheckoutQuery
     */
    public static function getPreCheckoutQueryWithAllFields1(): PreCheckoutQuery
    {
        return new PreCheckoutQuery(
            '9j2Wur0ziH',
            UserStub::getUserWithCommonFields1(),
            '1BCOCbVSeb',
            1385962937,
            'qDdSqClaiu',
            'YUt5V4lecG',
            OrderInfoStub::getOrderInfoWithCommonFields2()
        );
    }
    /**
     * @return PreCheckoutQuery
     */
    public static function getPreCheckoutQueryWithAllFields2(): PreCheckoutQuery
    {
        return new PreCheckoutQuery(
            '9pikiV92gC',
            UserStub::getUserWithCommonFields2(),
            '4y96FnCTqh',
            1356385677,
            'QAcCOWZo4k',
            'yggujV3yUo',
            OrderInfoStub::getOrderInfoWithCommonFields2()
        );
    }
    /**
     * @return PreCheckoutQuery
     */
    public static function getPreCheckoutQueryWithAllFields3(): PreCheckoutQuery
    {
        return new PreCheckoutQuery(
            'lZx0mrHscz',
            UserStub::getUserWithCommonFields3(),
            'dRfRiFCHRq',
            2048399384,
            'Gmh6EgQuyQ',
            'V1d7wv1CW8',
            OrderInfoStub::getOrderInfoWithCommonFields2()
        );
    }
}
