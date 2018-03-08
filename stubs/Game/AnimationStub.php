<?php

namespace alexshadie\TelegramBot\Game;

use alexshadie\TelegramBot\Type\PhotoSizeStub;

/**
 * Stub for Animation class. Use it for testing.
 */
class AnimationStub extends Animation
{
    /**
     * @return Animation
     */
    public static function getAnimationWithCommonFields1(): Animation
    {
        return new Animation(
            'Aa65YxEQgK'
        );
    }
    /**
     * @return Animation
     */
    public static function getAnimationWithCommonFields2(): Animation
    {
        return new Animation(
            'VUW5kIf0jL'
        );
    }
    /**
     * @return Animation
     */
    public static function getAnimationWithCommonFields3(): Animation
    {
        return new Animation(
            'xgWFc0dXQ1'
        );
    }
    /**
     * @return Animation
     */
    public static function getAnimationWithAllFields1(): Animation
    {
        return new Animation(
            'wscVqIJsQj',
            PhotoSizeStub::getPhotoSizeWithCommonFields1(),
            'QaPad4H0uw',
            's0RE36rNnn',
            10548513
        );
    }
    /**
     * @return Animation
     */
    public static function getAnimationWithAllFields2(): Animation
    {
        return new Animation(
            'owCgkIsyHB',
            PhotoSizeStub::getPhotoSizeWithCommonFields1(),
            'bIRbvPu7vr',
            'lXVYckcyt1',
            1852993685
        );
    }
    /**
     * @return Animation
     */
    public static function getAnimationWithAllFields3(): Animation
    {
        return new Animation(
            'iiHKmLz0p0',
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            'qFkNGfffSR',
            'GRB9j5isF0',
            1393149944
        );
    }
}
