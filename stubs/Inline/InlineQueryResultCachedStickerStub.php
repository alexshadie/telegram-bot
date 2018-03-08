<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

/**
 * Stub for InlineQueryResultCachedSticker class. Use it for testing.
 */
class InlineQueryResultCachedStickerStub extends InlineQueryResultCachedSticker
{
    /**
     * @return InlineQueryResultCachedSticker
     */
    public static function getInlineQueryResultCachedStickerWithCommonFields1(): InlineQueryResultCachedSticker
    {
        return new InlineQueryResultCachedSticker(
            'QDIqvKY6rI',
            's8hXPXyqDZ',
            'aHIDttzlQJ'
        );
    }
    /**
     * @return InlineQueryResultCachedSticker
     */
    public static function getInlineQueryResultCachedStickerWithCommonFields2(): InlineQueryResultCachedSticker
    {
        return new InlineQueryResultCachedSticker(
            'AWv14NAod6',
            'zrETzsfecI',
            'iuRGYjoYnh'
        );
    }
    /**
     * @return InlineQueryResultCachedSticker
     */
    public static function getInlineQueryResultCachedStickerWithCommonFields3(): InlineQueryResultCachedSticker
    {
        return new InlineQueryResultCachedSticker(
            'Xgr2mNMV2I',
            '5QcK4SpQCY',
            'sDLQ7QY2qI'
        );
    }
    /**
     * @return InlineQueryResultCachedSticker
     */
    public static function getInlineQueryResultCachedStickerWithAllFields1(): InlineQueryResultCachedSticker
    {
        return new InlineQueryResultCachedSticker(
            'mhJetjsdNv',
            'pF4wkGpgep',
            'nQ1jg2l201',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
    }
    /**
     * @return InlineQueryResultCachedSticker
     */
    public static function getInlineQueryResultCachedStickerWithAllFields2(): InlineQueryResultCachedSticker
    {
        return new InlineQueryResultCachedSticker(
            'hXtZei0unl',
            'o81Tsd2DCo',
            'qOyP8MDlHl',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1()
        );
    }
    /**
     * @return InlineQueryResultCachedSticker
     */
    public static function getInlineQueryResultCachedStickerWithAllFields3(): InlineQueryResultCachedSticker
    {
        return new InlineQueryResultCachedSticker(
            'vvZBFr9LTW',
            'xy6DtoK1ud',
            'U6Q6GQzshK',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1()
        );
    }
}
