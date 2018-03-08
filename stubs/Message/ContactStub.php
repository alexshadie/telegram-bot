<?php

namespace alexshadie\TelegramBot\Message;


/**
 * Stub for Contact class. Use it for testing.
 */
class ContactStub extends Contact
{
    /**
     * @return Contact
     */
    public static function getContactWithCommonFields1(): Contact
    {
        return new Contact(
            'QYeUc1yzLk',
            'viULyx0eR8'
        );
    }
    /**
     * @return Contact
     */
    public static function getContactWithCommonFields2(): Contact
    {
        return new Contact(
            '3ViK5wNwbv',
            'rvmhCxcS7H'
        );
    }
    /**
     * @return Contact
     */
    public static function getContactWithCommonFields3(): Contact
    {
        return new Contact(
            'TbKaN2VTtH',
            'COdrvfOOZv'
        );
    }
    /**
     * @return Contact
     */
    public static function getContactWithAllFields1(): Contact
    {
        return new Contact(
            '6WEVjXCThi',
            'bpbI5Pk4eq',
            'WIXIwPJQZb',
            476484864
        );
    }
    /**
     * @return Contact
     */
    public static function getContactWithAllFields2(): Contact
    {
        return new Contact(
            'i5O5bb5DZB',
            'YaHmrEQlXC',
            '3dQvqdsjYt',
            433424892
        );
    }
    /**
     * @return Contact
     */
    public static function getContactWithAllFields3(): Contact
    {
        return new Contact(
            'MnAuy2Rbzx',
            'wWIr9cdHHW',
            '3nP6IvigeN',
            325027016
        );
    }
}
