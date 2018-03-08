<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

/**
 * Stub for InlineQueryResultVoice class. Use it for testing.
 */
class InlineQueryResultVoiceStub extends InlineQueryResultVoice
{
    /**
     * @return InlineQueryResultVoice
     */
    public static function getInlineQueryResultVoiceWithCommonFields1(): InlineQueryResultVoice
    {
        return new InlineQueryResultVoice(
            '7T9xoM8Qi2',
            'RtqAPGV924',
            '8JKBGwFmvF',
            'HA8r85fu7i'
        );
    }
    /**
     * @return InlineQueryResultVoice
     */
    public static function getInlineQueryResultVoiceWithCommonFields2(): InlineQueryResultVoice
    {
        return new InlineQueryResultVoice(
            'amWeExqMfs',
            'QYSh8hY9UE',
            'z2QO6uxrud',
            'iULOXDnWXn'
        );
    }
    /**
     * @return InlineQueryResultVoice
     */
    public static function getInlineQueryResultVoiceWithCommonFields3(): InlineQueryResultVoice
    {
        return new InlineQueryResultVoice(
            'el3ScOfqXE',
            'szzldPRtE9',
            'qL92Fcq9W5',
            'ARrq1ZlK4y'
        );
    }
    /**
     * @return InlineQueryResultVoice
     */
    public static function getInlineQueryResultVoiceWithAllFields1(): InlineQueryResultVoice
    {
        return new InlineQueryResultVoice(
            'bhcbhIAqqs',
            'KxAabx3hH1',
            'OyNOreNg2G',
            'ioKSTog4pa',
            'CI20RAJFbA',
            'Lqb4Jx9ZA5',
            1430820111,
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
    }
    /**
     * @return InlineQueryResultVoice
     */
    public static function getInlineQueryResultVoiceWithAllFields2(): InlineQueryResultVoice
    {
        return new InlineQueryResultVoice(
            'nzPqkdiX3z',
            'bbTRDMXqM7',
            'rUuzZUyd1V',
            'xyxGgZuHOb',
            'Upy3vfyJLv',
            'eUzhY82YBk',
            1001009957,
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
    }
    /**
     * @return InlineQueryResultVoice
     */
    public static function getInlineQueryResultVoiceWithAllFields3(): InlineQueryResultVoice
    {
        return new InlineQueryResultVoice(
            'sdqqYjYNJL',
            '0KhOUPHEzV',
            '1gKr2oCd2X',
            'wlSL4WHtQp',
            'F2BVVRjcqd',
            'xcahlBweAP',
            352928111,
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
    }
}
