<?php

namespace alexshadie\TelegramBot\Keyboard;


/**
 * Stub for ReplyKeyboardMarkup class. Use it for testing.
 */
class ReplyKeyboardMarkupStub extends ReplyKeyboardMarkup
{
    /**
     * @return ReplyKeyboardMarkup
     */
    public static function getReplyKeyboardMarkupWithCommonFields1(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields1(), KeyboardButtonStub::getKeyboardButtonWithCommonFields1()]
        );
    }
    /**
     * @return ReplyKeyboardMarkup
     */
    public static function getReplyKeyboardMarkupWithCommonFields2(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields2(), KeyboardButtonStub::getKeyboardButtonWithCommonFields2(), KeyboardButtonStub::getKeyboardButtonWithCommonFields3()]
        );
    }
    /**
     * @return ReplyKeyboardMarkup
     */
    public static function getReplyKeyboardMarkupWithCommonFields3(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields1(), KeyboardButtonStub::getKeyboardButtonWithCommonFields2()]
        );
    }
    /**
     * @return ReplyKeyboardMarkup
     */
    public static function getReplyKeyboardMarkupWithAllFields1(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields1(), KeyboardButtonStub::getKeyboardButtonWithCommonFields3(), KeyboardButtonStub::getKeyboardButtonWithCommonFields3()],
            false,
            false,
            false
        );
    }
    /**
     * @return ReplyKeyboardMarkup
     */
    public static function getReplyKeyboardMarkupWithAllFields2(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields2(), KeyboardButtonStub::getKeyboardButtonWithCommonFields2(), KeyboardButtonStub::getKeyboardButtonWithCommonFields2()],
            true,
            true,
            true
        );
    }
    /**
     * @return ReplyKeyboardMarkup
     */
    public static function getReplyKeyboardMarkupWithAllFields3(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields1()],
            true,
            true,
            false
        );
    }
}
