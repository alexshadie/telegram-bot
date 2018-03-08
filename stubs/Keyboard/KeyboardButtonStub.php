<?php

namespace alexshadie\TelegramBot\Keyboard;


/**
 * Stub for KeyboardButton class. Use it for testing.
 */
class KeyboardButtonStub extends KeyboardButton
{
    /**
     * @return KeyboardButton
     */
    public static function getKeyboardButtonWithCommonFields1(): KeyboardButton
    {
        return new KeyboardButton(
            'rFmT8QPvcO'
        );
    }
    /**
     * @return KeyboardButton
     */
    public static function getKeyboardButtonWithCommonFields2(): KeyboardButton
    {
        return new KeyboardButton(
            'iTUUCH101D'
        );
    }
    /**
     * @return KeyboardButton
     */
    public static function getKeyboardButtonWithCommonFields3(): KeyboardButton
    {
        return new KeyboardButton(
            'kyG8R9AiLK'
        );
    }
    /**
     * @return KeyboardButton
     */
    public static function getKeyboardButtonWithAllFields1(): KeyboardButton
    {
        return new KeyboardButton(
            'UvRL9fP1fs',
            false,
            true
        );
    }
    /**
     * @return KeyboardButton
     */
    public static function getKeyboardButtonWithAllFields2(): KeyboardButton
    {
        return new KeyboardButton(
            'jmjJ78Mhy2',
            false,
            false
        );
    }
    /**
     * @return KeyboardButton
     */
    public static function getKeyboardButtonWithAllFields3(): KeyboardButton
    {
        return new KeyboardButton(
            '7A2x9b7bth',
            false,
            true
        );
    }
}
