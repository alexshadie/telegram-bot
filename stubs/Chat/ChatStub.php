<?php

namespace alexshadie\TelegramBot\Chat;

use alexshadie\TelegramBot\Query\MessageStub;

/**
 * Stub for Chat class. Use it for testing.
 */
class ChatStub extends Chat
{
    /**
     * @return Chat
     */
    public static function getChatWithCommonFields1(): Chat
    {
        return new Chat(
            26491648,
            'mxUxp7h8zy'
        );
    }
    /**
     * @return Chat
     */
    public static function getChatWithCommonFields2(): Chat
    {
        return new Chat(
            88924525,
            'dBbdHAdOtr'
        );
    }
    /**
     * @return Chat
     */
    public static function getChatWithCommonFields3(): Chat
    {
        return new Chat(
            1873700238,
            'EomDyI87NJ'
        );
    }
    /**
     * @return Chat
     */
    public static function getChatWithAllFields1(): Chat
    {
        return new Chat(
            238633365,
            'FUyGbZhVDL',
            'VCrFXHyctt',
            'T8dhT4hZte',
            'qgZ1h2M4se',
            'iZHDO2L4IW',
            true,
            ChatPhotoStub::getChatPhotoWithCommonFields3(),
            'V8ep569OmP',
            'nLn3h1fQs0',
            MessageStub::getMessageWithCommonFields2(),
            '93Xn6uXW8q',
            true
        );
    }
    /**
     * @return Chat
     */
    public static function getChatWithAllFields2(): Chat
    {
        return new Chat(
            237811693,
            'PCwIzHUYot',
            'lnJmGl9Q71',
            '9fr48vAKVj',
            'Xfg8jZHygw',
            'dw8X9McEng',
            false,
            ChatPhotoStub::getChatPhotoWithCommonFields1(),
            '3iLfEuh19X',
            'QFjnhBfN4S',
            MessageStub::getMessageWithCommonFields1(),
            'CNuwEENZI2',
            true
        );
    }
    /**
     * @return Chat
     */
    public static function getChatWithAllFields3(): Chat
    {
        return new Chat(
            1141899830,
            'ZoI0xlN769',
            'KeH7OpkNFN',
            'FNAmzYmVyD',
            '0StqeIJKLl',
            '4zDFCNn4zQ',
            true,
            ChatPhotoStub::getChatPhotoWithCommonFields1(),
            'Du6CQcbRin',
            'osv4Im8jLC',
            MessageStub::getMessageWithCommonFields1(),
            'GaARisOr0x',
            true
        );
    }
}
