<?php

namespace alexshadie\TelegramBot\Keyboard;


/**
 * Stub for ReplyKeyboardRemove class. Use it for testing.
 */
class ReplyKeyboardRemoveStub extends ReplyKeyboardRemove
{
    /**
     * @return ReplyKeyboardRemove
     */
    public static function getReplyKeyboardRemoveWithCommonFields1(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(
            false
        );
    }
    /**
     * @return ReplyKeyboardRemove
     */
    public static function getReplyKeyboardRemoveWithCommonFields2(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(
            false
        );
    }
    /**
     * @return ReplyKeyboardRemove
     */
    public static function getReplyKeyboardRemoveWithCommonFields3(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(
            true
        );
    }
    /**
     * @return ReplyKeyboardRemove
     */
    public static function getReplyKeyboardRemoveWithAllFields1(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(
            false,
            true
        );
    }
    /**
     * @return ReplyKeyboardRemove
     */
    public static function getReplyKeyboardRemoveWithAllFields2(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(
            false,
            false
        );
    }
    /**
     * @return ReplyKeyboardRemove
     */
    public static function getReplyKeyboardRemoveWithAllFields3(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(
            true,
            true
        );
    }
}
