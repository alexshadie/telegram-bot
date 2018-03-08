<?php

namespace alexshadie\TelegramBot\Objects;


/**
 * Stub for MessageEntity class. Use it for testing.
 */
class MessageEntityStub extends MessageEntity
{
    /**
     * @return MessageEntity
     */
    public static function getMessageEntityWithCommonFields1(): MessageEntity
    {
        return new MessageEntity(
            '2q8EzmEHbS',
            537063546,
            324962971
        );
    }
    /**
     * @return MessageEntity
     */
    public static function getMessageEntityWithCommonFields2(): MessageEntity
    {
        return new MessageEntity(
            'ehuMPwvQOF',
            2136906548,
            1127297818
        );
    }
    /**
     * @return MessageEntity
     */
    public static function getMessageEntityWithCommonFields3(): MessageEntity
    {
        return new MessageEntity(
            'yQ639dlwcl',
            1572136771,
            1361038472
        );
    }
    /**
     * @return MessageEntity
     */
    public static function getMessageEntityWithAllFields1(): MessageEntity
    {
        return new MessageEntity(
            'bCgIcABaMT',
            1285450411,
            141145189,
            'tlZAC9Jg9A',
            UserStub::getUserWithCommonFields2()
        );
    }
    /**
     * @return MessageEntity
     */
    public static function getMessageEntityWithAllFields2(): MessageEntity
    {
        return new MessageEntity(
            'fXeWqMLG1N',
            1516579323,
            1050483217,
            'g6NR2rvuck',
            UserStub::getUserWithCommonFields3()
        );
    }
    /**
     * @return MessageEntity
     */
    public static function getMessageEntityWithAllFields3(): MessageEntity
    {
        return new MessageEntity(
            'pqZ6SfxCB8',
            158375151,
            1894904969,
            'kynAcyBiKF',
            UserStub::getUserWithCommonFields3()
        );
    }
}
