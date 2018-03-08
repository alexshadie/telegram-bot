<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Objects\UserStub;

/**
 * Stub for CallbackQuery class. Use it for testing.
 */
class CallbackQueryStub extends CallbackQuery
{
    /**
     * @return CallbackQuery
     */
    public static function getCallbackQueryWithCommonFields1(): CallbackQuery
    {
        return new CallbackQuery(
            'ayUaNcUKtJ',
            UserStub::getUserWithCommonFields1(),
            'zsO3wkZsRp'
        );
    }
    /**
     * @return CallbackQuery
     */
    public static function getCallbackQueryWithCommonFields2(): CallbackQuery
    {
        return new CallbackQuery(
            'T2iZfVzWzx',
            UserStub::getUserWithCommonFields2(),
            'copPSsxI0E'
        );
    }
    /**
     * @return CallbackQuery
     */
    public static function getCallbackQueryWithCommonFields3(): CallbackQuery
    {
        return new CallbackQuery(
            'o4u080Ig92',
            UserStub::getUserWithCommonFields3(),
            '9JOBksBtRy'
        );
    }
    /**
     * @return CallbackQuery
     */
    public static function getCallbackQueryWithAllFields1(): CallbackQuery
    {
        return new CallbackQuery(
            'fCaDy7NgEU',
            UserStub::getUserWithCommonFields1(),
            'MClzTePO4X',
            MessageStub::getMessageWithCommonFields1(),
            'vKg3ho4vr5',
            '4bzZE3YmDB',
            'ZOaYLIZ5P8'
        );
    }
    /**
     * @return CallbackQuery
     */
    public static function getCallbackQueryWithAllFields2(): CallbackQuery
    {
        return new CallbackQuery(
            'j1LZ0yfFuO',
            UserStub::getUserWithCommonFields3(),
            'SbaTsf9g7R',
            MessageStub::getMessageWithCommonFields1(),
            'qd33CTFws1',
            'A54NuT6sVX',
            'qqtfkc7m74'
        );
    }
    /**
     * @return CallbackQuery
     */
    public static function getCallbackQueryWithAllFields3(): CallbackQuery
    {
        return new CallbackQuery(
            'fHOm3eJN9Y',
            UserStub::getUserWithCommonFields2(),
            '2xSZnGP9t2',
            MessageStub::getMessageWithCommonFields3(),
            'G08sYOIFEN',
            'Bn4HtOs6v0',
            '0sDZzHZcVb'
        );
    }
}
