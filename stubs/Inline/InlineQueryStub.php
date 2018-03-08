<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\UserStub;
use alexshadie\TelegramBot\Type\LocationStub;

/**
 * Stub for InlineQuery class. Use it for testing.
 */
class InlineQueryStub extends InlineQuery
{
    /**
     * @return InlineQuery
     */
    public static function getInlineQueryWithCommonFields1(): InlineQuery
    {
        return new InlineQuery(
            '949djd4uGh',
            UserStub::getUserWithCommonFields3(),
            '2hoEG6Hcd3',
            '9KKlLJpbod'
        );
    }
    /**
     * @return InlineQuery
     */
    public static function getInlineQueryWithCommonFields2(): InlineQuery
    {
        return new InlineQuery(
            'OlmidJ35eX',
            UserStub::getUserWithCommonFields3(),
            '7dA09AGcxQ',
            '1TzcPCw6DM'
        );
    }
    /**
     * @return InlineQuery
     */
    public static function getInlineQueryWithCommonFields3(): InlineQuery
    {
        return new InlineQuery(
            'uoMrOmCAoo',
            UserStub::getUserWithCommonFields3(),
            'Iz3Dv7SqDJ',
            '8JnzIKbISz'
        );
    }
    /**
     * @return InlineQuery
     */
    public static function getInlineQueryWithAllFields1(): InlineQuery
    {
        return new InlineQuery(
            'BU1G59zUVL',
            UserStub::getUserWithCommonFields2(),
            'CMBN10F7T5',
            'c1rVHkb6Bb',
            LocationStub::getLocationWithCommonFields2()
        );
    }
    /**
     * @return InlineQuery
     */
    public static function getInlineQueryWithAllFields2(): InlineQuery
    {
        return new InlineQuery(
            'dppQ7YtbZE',
            UserStub::getUserWithCommonFields2(),
            'en964VIgwB',
            '7Lf4iQfWkG',
            LocationStub::getLocationWithCommonFields3()
        );
    }
    /**
     * @return InlineQuery
     */
    public static function getInlineQueryWithAllFields3(): InlineQuery
    {
        return new InlineQuery(
            'bQqyeFZr28',
            UserStub::getUserWithCommonFields1(),
            'StKvUZ27hq',
            'poNNqp5tbl',
            LocationStub::getLocationWithCommonFields3()
        );
    }
}
