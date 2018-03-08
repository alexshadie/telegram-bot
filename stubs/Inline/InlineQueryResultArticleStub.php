<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

/**
 * Stub for InlineQueryResultArticle class. Use it for testing.
 */
class InlineQueryResultArticleStub extends InlineQueryResultArticle
{
    /**
     * @return InlineQueryResultArticle
     */
    public static function getInlineQueryResultArticleWithCommonFields1(): InlineQueryResultArticle
    {
        return new InlineQueryResultArticle(
            'TT8d9FSuQt',
            'FautsX5EjH',
            'xtiBkiUa1H',
            InputMessageContentStub::getInputMessageContentWithCommonFields1()
        );
    }
    /**
     * @return InlineQueryResultArticle
     */
    public static function getInlineQueryResultArticleWithCommonFields2(): InlineQueryResultArticle
    {
        return new InlineQueryResultArticle(
            'NSN6ECbPhg',
            'GTapGnBvH1',
            'fQbLnZsQNo',
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
    }
    /**
     * @return InlineQueryResultArticle
     */
    public static function getInlineQueryResultArticleWithCommonFields3(): InlineQueryResultArticle
    {
        return new InlineQueryResultArticle(
            'EFjXrX2tOc',
            'GH2pfM9XsN',
            'CWXbbcrA57',
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
    }
    /**
     * @return InlineQueryResultArticle
     */
    public static function getInlineQueryResultArticleWithAllFields1(): InlineQueryResultArticle
    {
        return new InlineQueryResultArticle(
            'tXYBPPGEaR',
            'LeuoRtKBPb',
            'SulLVnO8ic',
            InputMessageContentStub::getInputMessageContentWithCommonFields1(),
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            'TDclwG4sIq',
            false,
            'hmkPVpoCQ3',
            'WClbgNL4xw',
            1421332168,
            997650458
        );
    }
    /**
     * @return InlineQueryResultArticle
     */
    public static function getInlineQueryResultArticleWithAllFields2(): InlineQueryResultArticle
    {
        return new InlineQueryResultArticle(
            'lxfUak74x1',
            '4LxQxtYxj7',
            'xcv07bwK6x',
            InputMessageContentStub::getInputMessageContentWithCommonFields3(),
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            'FIKyriLy1k',
            true,
            'nys4EDkhQk',
            'Cdteh0JAxH',
            990988922,
            1299120905
        );
    }
    /**
     * @return InlineQueryResultArticle
     */
    public static function getInlineQueryResultArticleWithAllFields3(): InlineQueryResultArticle
    {
        return new InlineQueryResultArticle(
            'IBoZ8fEFvv',
            'YaAT04JA7J',
            'OLTgasOUcO',
            InputMessageContentStub::getInputMessageContentWithCommonFields2(),
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            'mBD565RtPU',
            true,
            'aYXiqGIqFk',
            'y42ATN0sSK',
            1703434940,
            897388640
        );
    }
}
