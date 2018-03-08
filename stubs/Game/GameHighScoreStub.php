<?php

namespace alexshadie\TelegramBot\Game;

use alexshadie\TelegramBot\Objects\UserStub;

/**
 * Stub for GameHighScore class. Use it for testing.
 */
class GameHighScoreStub extends GameHighScore
{
    /**
     * @return GameHighScore
     */
    public static function getGameHighScoreWithCommonFields1(): GameHighScore
    {
        return new GameHighScore(
            1723548158,
            UserStub::getUserWithCommonFields2(),
            1431540646
        );
    }
    /**
     * @return GameHighScore
     */
    public static function getGameHighScoreWithCommonFields2(): GameHighScore
    {
        return new GameHighScore(
            1837842818,
            UserStub::getUserWithCommonFields3(),
            892407221
        );
    }
    /**
     * @return GameHighScore
     */
    public static function getGameHighScoreWithCommonFields3(): GameHighScore
    {
        return new GameHighScore(
            773710263,
            UserStub::getUserWithCommonFields1(),
            1012038652
        );
    }
    /**
     * @return GameHighScore
     */
    public static function getGameHighScoreWithAllFields1(): GameHighScore
    {
        return new GameHighScore(
            1466121294,
            UserStub::getUserWithCommonFields3(),
            2033668142
        );
    }
    /**
     * @return GameHighScore
     */
    public static function getGameHighScoreWithAllFields2(): GameHighScore
    {
        return new GameHighScore(
            2064672995,
            UserStub::getUserWithCommonFields2(),
            1880596032
        );
    }
    /**
     * @return GameHighScore
     */
    public static function getGameHighScoreWithAllFields3(): GameHighScore
    {
        return new GameHighScore(
            2025489615,
            UserStub::getUserWithCommonFields1(),
            1254963129
        );
    }
}
