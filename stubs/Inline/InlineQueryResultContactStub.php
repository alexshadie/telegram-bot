<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

/**
 * Stub for InlineQueryResultContact class. Use it for testing.
 */
class InlineQueryResultContactStub extends InlineQueryResultContact
{
    /**
     * @return InlineQueryResultContact
     */
    public static function getInlineQueryResultContactWithCommonFields1(): InlineQueryResultContact
    {
        return new InlineQueryResultContact(
            'EuqMteqJzT',
            'StzSOWymRz',
            'CV2mIoGd69',
            '60b2UvCmRb'
        );
    }
    /**
     * @return InlineQueryResultContact
     */
    public static function getInlineQueryResultContactWithCommonFields2(): InlineQueryResultContact
    {
        return new InlineQueryResultContact(
            'buHX5IuQNM',
            'eCbeJISJL2',
            '3H90GF1nIw',
            'w3GNJShmui'
        );
    }
    /**
     * @return InlineQueryResultContact
     */
    public static function getInlineQueryResultContactWithCommonFields3(): InlineQueryResultContact
    {
        return new InlineQueryResultContact(
            'F7qLg0ZppE',
            'D6YCRLomTg',
            'ERMYtFjAjU',
            'baXPMr1msu'
        );
    }
    /**
     * @return InlineQueryResultContact
     */
    public static function getInlineQueryResultContactWithAllFields1(): InlineQueryResultContact
    {
        return new InlineQueryResultContact(
            'SJDFZPuFRq',
            '13rI3eJT8j',
            'I0EIDtEuaG',
            'fFma7YgpGT',
            '2zIVxUknE4',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2(),
            'ue1I01M3Ca',
            642738716,
            1854276620
        );
    }
    /**
     * @return InlineQueryResultContact
     */
    public static function getInlineQueryResultContactWithAllFields2(): InlineQueryResultContact
    {
        return new InlineQueryResultContact(
            'oGPlRLYxWK',
            'SF51CvTxfj',
            'HRgj5EBcqH',
            'mbBDX3cFie',
            'irzSNofoI8',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2(),
            'fP1bAvJHsI',
            1025703891,
            611061960
        );
    }
    /**
     * @return InlineQueryResultContact
     */
    public static function getInlineQueryResultContactWithAllFields3(): InlineQueryResultContact
    {
        return new InlineQueryResultContact(
            'ivts7ioaY7',
            'pz8Iq9wakm',
            'a95nzWRQ1I',
            'ch83TsQJZu',
            'ZWfmSCdDF0',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3(),
            'ecwVGMvAJD',
            1410206937,
            708793846
        );
    }
}
