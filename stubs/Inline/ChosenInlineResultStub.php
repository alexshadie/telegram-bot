<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\UserStub;
use alexshadie\TelegramBot\Type\LocationStub;

/**
 * Stub for ChosenInlineResult class. Use it for testing.
 */
class ChosenInlineResultStub extends ChosenInlineResult
{
    /**
     * @return ChosenInlineResult
     */
    public static function getChosenInlineResultWithCommonFields1(): ChosenInlineResult
    {
        return new ChosenInlineResult(
            'ieNrI5I1gk',
            UserStub::getUserWithCommonFields2(),
            'Ss3JAQEsiQ'
        );
    }
    /**
     * @return ChosenInlineResult
     */
    public static function getChosenInlineResultWithCommonFields2(): ChosenInlineResult
    {
        return new ChosenInlineResult(
            'kPTXCKrVUq',
            UserStub::getUserWithCommonFields3(),
            'oemIEXXCPh'
        );
    }
    /**
     * @return ChosenInlineResult
     */
    public static function getChosenInlineResultWithCommonFields3(): ChosenInlineResult
    {
        return new ChosenInlineResult(
            '2YtWtOCNLI',
            UserStub::getUserWithCommonFields3(),
            'YY8osXpoul'
        );
    }
    /**
     * @return ChosenInlineResult
     */
    public static function getChosenInlineResultWithAllFields1(): ChosenInlineResult
    {
        return new ChosenInlineResult(
            'DekOQTSt3a',
            UserStub::getUserWithCommonFields1(),
            'PGzkIsrLEz',
            LocationStub::getLocationWithCommonFields1(),
            'uQrCpmOuAF'
        );
    }
    /**
     * @return ChosenInlineResult
     */
    public static function getChosenInlineResultWithAllFields2(): ChosenInlineResult
    {
        return new ChosenInlineResult(
            'Rhz4M8oP4t',
            UserStub::getUserWithCommonFields3(),
            'sHeZOid4s1',
            LocationStub::getLocationWithCommonFields2(),
            'GkvEF2YuDK'
        );
    }
    /**
     * @return ChosenInlineResult
     */
    public static function getChosenInlineResultWithAllFields3(): ChosenInlineResult
    {
        return new ChosenInlineResult(
            'cAbH8FgQ4w',
            UserStub::getUserWithCommonFields2(),
            'cIJg31w3e2',
            LocationStub::getLocationWithCommonFields2(),
            'piCrcaQPyX'
        );
    }
}
