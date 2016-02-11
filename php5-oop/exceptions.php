<?php

class CliException extends \Exception {}

class RequiredException extends CliException {}

class RequiredArgsException extends CliException {}

class CliParser
{
  public static function parse ($format, $args)
  {
    foreach ($format as $key => $value) {
      if ($value['required']) {
        # code...
      }
    }
  }
}
