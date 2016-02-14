<?php

class CliException extends \Exception {}

class RequiredException extends CliException {}

class RequiredArgsException extends CliException {}

class CliParser
{
  public static function parse ($argsFormat, $args)
  {
    foreach ($argsFormat as $key => $value) {

      if ($value['required'] && !array_key_exists($key, $args)) {
        throw new RequiredException();
      }

      if ($value['requiredArgs']
          && (array_key_exists($key, $args) && !is_null($args[$key]))) {
        throw new RequiredArgsException();
      }
    }
  }
}
