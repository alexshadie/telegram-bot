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
     * @param $data
     * @return Object
     */
    public static function createFromObjectList($data)
    {
        return null;
    }

    /**
     * @param $data
     * @return Object
     */
    public static function createFromObject($data)
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