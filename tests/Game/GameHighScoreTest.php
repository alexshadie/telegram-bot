<?php

namespace alexshadie\TelegramBot\Game;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Objects\UserStub;

class GameHighScoreTest extends TestCase
{
    public function testConstructGameHighScoreWithCommonFields()
    {
        $obj = new GameHighScore(
            144852291,
            UserStub::getUserWithCommonFields2(),
            784008392
        );
        $this->assertEquals(144852291, $obj->getPosition());
        $this->assertEquals(UserStub::getUserWithCommonFields2(), $obj->getUser());
        $this->assertEquals(784008392, $obj->getScore());
    }

    public function testConstructGameHighScoreWithAllFields()
    {
        $obj = new GameHighScore(
            174239491,
            UserStub::getUserWithCommonFields3(),
            132650897
        );
        $this->assertEquals(174239491, $obj->getPosition());
        $this->assertEquals(UserStub::getUserWithCommonFields3(), $obj->getUser());
        $this->assertEquals(132650897, $obj->getScore());
    }
}
