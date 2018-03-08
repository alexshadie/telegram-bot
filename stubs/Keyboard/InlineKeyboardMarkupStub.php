<?php

namespace alexshadie\TelegramBot\Keyboard;


/**
 * Stub for InlineKeyboardMarkup class. Use it for testing.
 */
class InlineKeyboardMarkupStub extends InlineKeyboardMarkup
{
    /**
     * @return InlineKeyboardMarkup
     */
    public static function getInlineKeyboardMarkupWithCommonFields1(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1()]
        );
    }
    /**
     * @return InlineKeyboardMarkup
     */
    public static function getInlineKeyboardMarkupWithCommonFields2(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1()]
        );
    }
    /**
     * @return InlineKeyboardMarkup
     */
    public static function getInlineKeyboardMarkupWithCommonFields3(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields3()]
        );
    }
    /**
     * @return InlineKeyboardMarkup
     */
    public static function getInlineKeyboardMarkupWithAllFields1(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields3(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields3()]
        );
    }
    /**
     * @return InlineKeyboardMarkup
     */
    public static function getInlineKeyboardMarkupWithAllFields2(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields3()]
        );
    }
    /**
     * @return InlineKeyboardMarkup
     */
    public static function getInlineKeyboardMarkupWithAllFields3(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields3()]
        );
    }
}
