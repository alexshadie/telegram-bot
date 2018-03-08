<?php

namespace alexshadie\TelegramBot\Message;

use alexshadie\TelegramBot\Type\PhotoSizeStub;
use alexshadie\TelegramBot\Sticker\MaskPositionStub;

/**
 * Stub for Sticker class. Use it for testing.
 */
class StickerStub extends Sticker
{
    /**
     * @return Sticker
     */
    public static function getStickerWithCommonFields1(): Sticker
    {
        return new Sticker(
            'LfHl3ns19o',
            1931641262,
            700235257
        );
    }
    /**
     * @return Sticker
     */
    public static function getStickerWithCommonFields2(): Sticker
    {
        return new Sticker(
            'zcZ2QEW40i',
            1135389195,
            570584926
        );
    }
    /**
     * @return Sticker
     */
    public static function getStickerWithCommonFields3(): Sticker
    {
        return new Sticker(
            'Lmgp9NDnn4',
            933367703,
            1873447775
        );
    }
    /**
     * @return Sticker
     */
    public static function getStickerWithAllFields1(): Sticker
    {
        return new Sticker(
            'NzPQJqiNDR',
            259561252,
            539306034,
            PhotoSizeStub::getPhotoSizeWithCommonFields1(),
            'fAJlMTrU63',
            'jR2llDoHI2',
            MaskPositionStub::getMaskPositionWithCommonFields1(),
            1357465515
        );
    }
    /**
     * @return Sticker
     */
    public static function getStickerWithAllFields2(): Sticker
    {
        return new Sticker(
            'kplo42rGXH',
            1334359240,
            1734659521,
            PhotoSizeStub::getPhotoSizeWithCommonFields3(),
            'pIpGwYw33F',
            '96sEkCtVDd',
            MaskPositionStub::getMaskPositionWithCommonFields3(),
            435338438
        );
    }
    /**
     * @return Sticker
     */
    public static function getStickerWithAllFields3(): Sticker
    {
        return new Sticker(
            'jNz3AgUbRS',
            407409792,
            1145983625,
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            '8PctHEZayg',
            'DBKFPYi3i7',
            MaskPositionStub::getMaskPositionWithCommonFields1(),
            1948266148
        );
    }
}
