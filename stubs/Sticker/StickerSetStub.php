<?php

namespace alexshadie\TelegramBot\Sticker;

use alexshadie\TelegramBot\Message\StickerStub;

/**
 * Stub for StickerSet class. Use it for testing.
 */
class StickerSetStub extends StickerSet
{
    /**
     * @return StickerSet
     */
    public static function getStickerSetWithCommonFields1(): StickerSet
    {
        return new StickerSet(
            '3PstPPU5qP',
            'pGGqD2iy2j',
            true,
            [StickerStub::getStickerWithCommonFields2(), StickerStub::getStickerWithCommonFields3(), StickerStub::getStickerWithCommonFields3()]
        );
    }
    /**
     * @return StickerSet
     */
    public static function getStickerSetWithCommonFields2(): StickerSet
    {
        return new StickerSet(
            'oFke7Camwo',
            'EMhtEPwqHv',
            true,
            [StickerStub::getStickerWithCommonFields1(), StickerStub::getStickerWithCommonFields2(), StickerStub::getStickerWithCommonFields3()]
        );
    }
    /**
     * @return StickerSet
     */
    public static function getStickerSetWithCommonFields3(): StickerSet
    {
        return new StickerSet(
            'W6QssM2IJP',
            'AKVHNNAjKL',
            false,
            [StickerStub::getStickerWithCommonFields1(), StickerStub::getStickerWithCommonFields3(), StickerStub::getStickerWithCommonFields1()]
        );
    }
    /**
     * @return StickerSet
     */
    public static function getStickerSetWithAllFields1(): StickerSet
    {
        return new StickerSet(
            'yJkLuKP5d9',
            'CXwboCZuko',
            false,
            [StickerStub::getStickerWithCommonFields2()]
        );
    }
    /**
     * @return StickerSet
     */
    public static function getStickerSetWithAllFields2(): StickerSet
    {
        return new StickerSet(
            'yVn7H1RSNa',
            'AXA34FweOq',
            true,
            [StickerStub::getStickerWithCommonFields2(), StickerStub::getStickerWithCommonFields3(), StickerStub::getStickerWithCommonFields2()]
        );
    }
    /**
     * @return StickerSet
     */
    public static function getStickerSetWithAllFields3(): StickerSet
    {
        return new StickerSet(
            '01WzdK0ZfT',
            'kAfSUAst1U',
            true,
            [StickerStub::getStickerWithCommonFields3(), StickerStub::getStickerWithCommonFields1(), StickerStub::getStickerWithCommonFields3()]
        );
    }
}
