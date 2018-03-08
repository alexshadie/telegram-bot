<?php

namespace alexshadie\TelegramBot\Game;

use alexshadie\TelegramBot\Type\PhotoSizeStub;
use alexshadie\TelegramBot\Objects\MessageEntityStub;

/**
 * Stub for Game class. Use it for testing.
 */
class GameStub extends Game
{
    /**
     * @return Game
     */
    public static function getGameWithCommonFields1(): Game
    {
        return new Game(
            'qKEA1eaMlC',
            'Qtf3AnaHpT',
            [PhotoSizeStub::getPhotoSizeWithCommonFields2(), PhotoSizeStub::getPhotoSizeWithCommonFields1()]
        );
    }
    /**
     * @return Game
     */
    public static function getGameWithCommonFields2(): Game
    {
        return new Game(
            'QoHOAXBz5z',
            'if6ZXPLZeT',
            [PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields2(), PhotoSizeStub::getPhotoSizeWithCommonFields1()]
        );
    }
    /**
     * @return Game
     */
    public static function getGameWithCommonFields3(): Game
    {
        return new Game(
            'q5QWQJCOK2',
            'n3kYJTjdck',
            [PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3()]
        );
    }
    /**
     * @return Game
     */
    public static function getGameWithAllFields1(): Game
    {
        return new Game(
            'AEHX8Sshrq',
            '317b5hr8fJ',
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3()],
            '5Q9ppPIh5Z',
            [MessageEntityStub::getMessageEntityWithCommonFields3()],
            AnimationStub::getAnimationWithCommonFields1()
        );
    }
    /**
     * @return Game
     */
    public static function getGameWithAllFields2(): Game
    {
        return new Game(
            'hCITTiDloN',
            'quYsv6pOwF',
            [PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1()],
            '5BVXXROMwL',
            [MessageEntityStub::getMessageEntityWithCommonFields3(), MessageEntityStub::getMessageEntityWithCommonFields1()],
            AnimationStub::getAnimationWithCommonFields1()
        );
    }
    /**
     * @return Game
     */
    public static function getGameWithAllFields3(): Game
    {
        return new Game(
            'boOG1soDhu',
            'LGG0TvtxKi',
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3()],
            'lTNZeKkPEv',
            [MessageEntityStub::getMessageEntityWithCommonFields2(), MessageEntityStub::getMessageEntityWithCommonFields3(), MessageEntityStub::getMessageEntityWithCommonFields2()],
            AnimationStub::getAnimationWithCommonFields2()
        );
    }
}
