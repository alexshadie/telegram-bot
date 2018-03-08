<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

/**
 * Stub for InlineQueryResultVenue class. Use it for testing.
 */
class InlineQueryResultVenueStub extends InlineQueryResultVenue
{
    /**
     * @return InlineQueryResultVenue
     */
    public static function getInlineQueryResultVenueWithCommonFields1(): InlineQueryResultVenue
    {
        return new InlineQueryResultVenue(
            'BhUGMYXEqT',
            '5nkRL89YSz',
            15587852.3,
            13279343.99,
            '4dj2FLwiOE',
            'Rhz2o7hSv4'
        );
    }
    /**
     * @return InlineQueryResultVenue
     */
    public static function getInlineQueryResultVenueWithCommonFields2(): InlineQueryResultVenue
    {
        return new InlineQueryResultVenue(
            '8r1F2M7kot',
            'YJWdltFppJ',
            2286400.83,
            13859332.19,
            'HiH1jkEGbY',
            'x3z0p0QAd3'
        );
    }
    /**
     * @return InlineQueryResultVenue
     */
    public static function getInlineQueryResultVenueWithCommonFields3(): InlineQueryResultVenue
    {
        return new InlineQueryResultVenue(
            'QhQozUPJM7',
            'E1xymWYpua',
            7652610.31,
            19604290.48,
            'aDK2d2j53n',
            'mDbpytjdWY'
        );
    }
    /**
     * @return InlineQueryResultVenue
     */
    public static function getInlineQueryResultVenueWithAllFields1(): InlineQueryResultVenue
    {
        return new InlineQueryResultVenue(
            'ptxIhFz71i',
            'NG660IZ5at',
            20808396.71,
            21377180.08,
            'gm76M9X8uo',
            'PW8XZtCrlA',
            '5Ae0G5bEYb',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1(),
            'QnsPTIxj05',
            769476866,
            144493999
        );
    }
    /**
     * @return InlineQueryResultVenue
     */
    public static function getInlineQueryResultVenueWithAllFields2(): InlineQueryResultVenue
    {
        return new InlineQueryResultVenue(
            'ellBs1KV53',
            'isc573dYyI',
            6758082.59,
            18339480.41,
            'XAVq4dJMS4',
            'rllMlzuNT1',
            '577h3RtRCH',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3(),
            'JTFRFihteY',
            1246313669,
            523076818
        );
    }
    /**
     * @return InlineQueryResultVenue
     */
    public static function getInlineQueryResultVenueWithAllFields3(): InlineQueryResultVenue
    {
        return new InlineQueryResultVenue(
            'j4QrNpB9SA',
            'LKnMnN3rIs',
            94649.37,
            6109856.82,
            'vSuwJpyb7Y',
            'ZkIQtLT381',
            'lumLHzJAaz',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1(),
            'qr5B2p1rtc',
            448531872,
            353983332
        );
    }
}
