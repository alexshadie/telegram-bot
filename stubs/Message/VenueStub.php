<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Type\LocationStub;

/**
 * Stub for Venue class. Use it for testing.
 */
class VenueStub extends Venue
{
    /**
     * @return Venue
     */
    public static function getVenueWithCommonFields1(): Venue
    {
        return new Venue(
            LocationStub::getLocationWithCommonFields2(),
            'KoyeqTdTtC',
            'dWjn2dMvzw'
        );
    }
    /**
     * @return Venue
     */
    public static function getVenueWithCommonFields2(): Venue
    {
        return new Venue(
            LocationStub::getLocationWithCommonFields2(),
            '2GzXnuO9pg',
            'IZnp8CgMtb'
        );
    }
    /**
     * @return Venue
     */
    public static function getVenueWithCommonFields3(): Venue
    {
        return new Venue(
            LocationStub::getLocationWithCommonFields1(),
            '0rMc2R4aQ8',
            'CJfIJQFtYh'
        );
    }
    /**
     * @return Venue
     */
    public static function getVenueWithAllFields1(): Venue
    {
        return new Venue(
            LocationStub::getLocationWithCommonFields2(),
            'OHG3CBCGtj',
            'hmJIphcSd6',
            'J8zQcMzTEt'
        );
    }
    /**
     * @return Venue
     */
    public static function getVenueWithAllFields2(): Venue
    {
        return new Venue(
            LocationStub::getLocationWithCommonFields3(),
            'tVxs71XYTa',
            'quiDSMq9JG',
            'CTgNmNk6rH'
        );
    }
    /**
     * @return Venue
     */
    public static function getVenueWithAllFields3(): Venue
    {
        return new Venue(
            LocationStub::getLocationWithCommonFields3(),
            'MWAawd6wyG',
            'G1CTWwI2ei',
            '7Z42DofDkl'
        );
    }
}
