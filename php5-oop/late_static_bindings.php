<?php

public static $tableName = null;

public static function getTableName()
{
    return static::$tableName ? static::$tableName : self::foo(get_called_class());
}

public static function foo($className)
{
    $class_name = end(explode('\\', $className));
    return strtolower($class_name);
}
