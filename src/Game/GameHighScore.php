<?php

namespace alexshadie\TelegramBot\Game;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;

/**
 * This object represents one row of the high scores table for a game.
 *
 * 
 *
 * And that‘s about all we’ve got for now.
 *
 * If you've got any questions, please check out our Bot FAQ »
 *
 */
class GameHighScore extends Object
{
    /**
     * Position in high score table for the game
     *
     * @var int
     */
    private $position;

    /**
     * User
     *
     * @var User
     */
    private $user;

    /**
     * Score
     *
     * @var int
     */
    private $score;

    /**
     * GameHighScore constructor.
     *
     * @param int $position
     * @param User $user
     * @param int $score
     */
    public function __construct(int $position, User $user, int $score)
    {
        $this->position = $position;
        $this->user = $user;
        $this->score = $score;
    }

    /**
     * Position in high score table for the game
     *
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * User
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Score
     *
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
      * Creates GameHighScore object from data.
      * @param \stdClass $data
      * @return GameHighScore
      */
    public static function createFromObject(?\stdClass $data): ?GameHighScore
    {
        if (is_null($data)) {
            return null;
        }
        $object = new GameHighScore(
            $data->position,
            User::createFromObject($data->user),
            $data->score
        );


        return $object;
    }

    /**
      * Creates array of GameHighScore objects from data.
      * @param array $data
      * @return GameHighScore[]
      */
    public static function createFromObjectList(?array $data): ?array
    {
        if (is_null($data)) {
            return null;
        };
        $objects = [];
        foreach ($data as $row) {
            $objects[] = static::createFromObject($row);
        }
        return $objects;
    }

}
