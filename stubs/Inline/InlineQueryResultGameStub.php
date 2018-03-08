<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

/**
 * Stub for InlineQueryResultGame class. Use it for testing.
 */
class InlineQueryResultGameStub extends InlineQueryResultGame
{
    /**
     * @return InlineQueryResultGame
     */
    public static function getInlineQueryResultGameWithCommonFields1(): InlineQueryResultGame
    {
        return new InlineQueryResultGame(
            'G2KhJjPZdL',
            'hUWf7Z3aZK',
            'uaHJXiW7bO'
        );
    }
    /**
     * @return InlineQueryResultGame
     */
    public static function getInlineQueryResultGameWithCommonFields2(): InlineQueryResultGame
    {
        return new InlineQueryResultGame(
            'zX0dH26rNv',
            'Qz8c90H1d2',
            'p23tm9yyed'
        );
    }
    /**
     * @return InlineQueryResultGame
     */
    public static function getInlineQueryResultGameWithCommonFields3(): InlineQueryResultGame
    {
        return new InlineQueryResultGame(
            'tdwhqHh68H',
            'f6tbnrw8Fb',
            'O7ARVaXnCU'
        );
    }
    /**
     * @return InlineQueryResultGame
     */
    public static function getInlineQueryResultGameWithAllFields1(): InlineQueryResultGame
    {
        return new InlineQueryResultGame(
            'O5lU0C4yeB',
            'GoQI5rYt6G',
            '2OJZP88adP',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3()
        );
    }
    /**
     * @return InlineQueryResultGame
     */
    public static function getInlineQueryResultGameWithAllFields2(): InlineQueryResultGame
    {
        return new InlineQueryResultGame(
            'vpWxdngLNe',
            'weTiEVNNe7',
            '1ts0K298Wn',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2()
        );
    }
    /**
     * @return InlineQueryResultGame
     */
    public static function getInlineQueryResultGameWithAllFields3(): InlineQueryResultGame
    {
        return new InlineQueryResultGame(
            'I9aMdjoj4v',
            '0FVsfhioFc',
            'oChOqt7Vgy',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2()
        );
    }
}
