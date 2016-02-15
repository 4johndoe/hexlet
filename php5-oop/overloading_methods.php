<?php

class Repo
{
  private $tableName;

  public function __construct ($tableName)
  {
    return $this->tableName = $tableName;
  }

  public function __call ($finder, $arguments)
  {
    preg_match("/findAllBy([A-Z].*)/", $finder, $outputArray);
    if (!$outputArray) {
      throw new \Exception("f**k");
    }

    $fieldUpperName = $outputArray[1];

    preg_match_all("/[A-Z][^A-Z]+/", $fieldUpperName, $matches);

    $fieldName = implode('_', array_map(function($part) {
      return mb_strtolower($part);
    }, $matches[0]));

    return $this->where($fieldName. $arguments[0]);
  }

  public function where($fieldName, $value)
  {
      $format = "select * from %s where %s = '%s'";
      return sprintf(
          $format,
          $this->_escape($this->tableName),
          $this->_escape($fieldName),
          $this->_escape($value)
      );
  }

  private function _escape($value)
  {
      // NOTE: we must to implement escape logic over here in real world
      return $value;
  }
}

$repo = new Repo("users");
$repo->findAllByName();
