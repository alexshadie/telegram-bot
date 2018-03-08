<?php

namespace alexshadie\TelegramBot\Objects;


/**
 * Stub for User class. Use it for testing.
 */
class UserStub extends User
{
    /**
     * @return User
     */
    public static function getUserWithCommonFields1(): User
    {
        return new User(
            2058058387,
            true,
            'byY3QxB5V9'
        );
    }
    /**
     * @return User
     */
    public static function getUserWithCommonFields2(): User
    {
        return new User(
            1474820471,
            false,
            'fdmLT6GaxC'
        );
    }
    /**
     * @return User
     */
    public static function getUserWithCommonFields3(): User
    {
        return new User(
            2073914128,
            true,
            'V0SFWSqSmy'
        );
    }
    /**
     * @return User
     */
    public static function getUserWithAllFields1(): User
    {
        return new User(
            1975099715,
            true,
            'WR6KOQC2sR',
            'hpqh2KIJ9n',
            'P6z4F6xbxq',
            'lGMdHXK7j5'
        );
    }
    /**
     * @return User
     */
    public static function getUserWithAllFields2(): User
    {
        return new User(
            532872085,
            false,
            'K3TLbn70qn',
            'V58RsctUnB',
            'fjo7A24DiU',
            'wJtfYfVI0c'
        );
    }
    /**
     * @return User
     */
    public static function getUserWithAllFields3(): User
    {
        return new User(
            1565477359,
            false,
            'UQBezh8u6n',
            'AfkfBVsUPJ',
            'rUTxxqkH5I',
            'fwXFOeR7PW'
        );
    }
}
