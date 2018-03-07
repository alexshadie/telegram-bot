<?php

namespace alexshadie\TelegramBot\Sticker;

use alexshadie\TelegramBot\Objects\Object;

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 */
class MaskPosition extends Object
{
    /**
     * The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or
     * “chin”.
     *
     * @var string
     */
    private $point;

    /**
     * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing
     * -1.0 will place mask just to the left of the default mask position.
     *
     * @var float
     */
    private $x_shift;

    /**
     * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will
     * place the mask just below the default mask position.
     *
     * @var float
     */
    private $y_shift;

    /**
     * Mask scaling coefficient. For example, 2.0 means double size.
     *
     * @var float
     */
    private $scale;

    /**
     * The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or
     * “chin”.
     *
     * @return string
     */
    public function getPoint(): string
    {
        return $this->point;
    }

    /**
     * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing
     * -1.0 will place mask just to the left of the default mask position.
     *
     * @return float
     */
    public function getXShift(): float
    {
        return $this->x_shift;
    }

    /**
     * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will
     * place the mask just below the default mask position.
     *
     * @return float
     */
    public function getYShift(): float
    {
        return $this->y_shift;
    }

    /**
     * Mask scaling coefficient. For example, 2.0 means double size.
     *
     * @return float
     */
    public function getScale(): float
    {
        return $this->scale;
    }

    /**
      * Creates MaskPosition object from data.
      * @param \stdClass $data
      * @return MaskPosition
      */
    public static function createFromObject(?\stdClass $data): ?MaskPosition
    {
        if (is_null($data)) {
            return null;
        }
        $object = new MaskPosition();
        $object->point = $data->point;
        $object->x_shift = $data->x_shift;
        $object->y_shift = $data->y_shift;
        $object->scale = $data->scale;
        return $object;
    }

    /**
      * Creates array of MaskPosition objects from data.
      * @param array $data
      * @return MaskPosition[]
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
