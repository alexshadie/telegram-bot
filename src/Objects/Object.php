<?php

namespace alexshadie\TelegramBot\Objects;


class Object
{
    public static function getVars($class)
    {
        $result = [];
        foreach (get_class_vars($class) as $var_name => $var_value) {
            $result[] = $var_name;
        }
        return $result;
    }

    /**
     * @param \stdClass[] $data
     * @return Object[]|null
     */
    public static function createFromObjectList(array $data): ?array
    {
        if (is_null($data)) {
            return null;
        }
        $objects = [];
        foreach ($data as $row) {
            $objects[] = static::createFromObject($row);
        }
        return $objects;
    }

    /**
     * @param \stdClass $data
     * @return Object|null
     */
    public static function createFromObject(\stdClass $data)
    {
        return null;
    }

    public function __toString()
    {
        return $this->toString(0);
    }

    public function toString($indent = 0)
    {
        $i = str_repeat("\t", $indent);
        $reflection = new \ReflectionClass($this);
        $vars = $reflection->getProperties();

        $return = "\n{$i}object(" . get_class($this) . ") [\n";
        foreach ($vars as $property) {
            $return .= "{$i}\t" . $property->getName() . " => ";
            $property->setAccessible(true);
            $var_value = $property->getValue($this);
            if ($var_value instanceof Object) {
                $return .= $var_value->toString($indent + 1);
            } else {
                $return .= $var_value;
            }
            $return .= "\n";
        }

        $return .= "{$i}]\n";
        return $return;
    }
}