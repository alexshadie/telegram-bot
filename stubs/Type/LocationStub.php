<?php

namespace alexshadie\TelegramBot\Type;


/**
 * Stub for Location class. Use it for testing.
 */
class LocationStub extends Location
{
    /**
     * @return Location
     */
    public static function getLocationWithCommonFields1(): Location
    {
        return new Location(
            9238319.83,
            14249784.26
        );
    }
    /**
     * @return Location
     */
    public static function getLocationWithCommonFields2(): Location
    {
        return new Location(
            16413702.03,
            2140113.95
        );
    }
    /**
     * @return Location
     */
    public static function getLocationWithCommonFields3(): Location
    {
        return new Location(
            9317022.39,
            5982787.23
        );
    }
    /**
     * @return Location
     */
    public static function getLocationWithAllFields1(): Location
    {
        return new Location(
            5435409.45,
            8073967.42
        );
    }
    /**
     * @return Location
     */
    public static function getLocationWithAllFields2(): Location
    {
        return new Location(
            2597323.48,
            10339261
        );
    }
    /**
     * @return Location
     */
    public static function getLocationWithAllFields3(): Location
    {
        return new Location(
            12745834.68,
            998790
        );
    }
}
