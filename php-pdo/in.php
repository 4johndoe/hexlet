<?php

function where ($pdo, array $params)
{
  $whereParts = array_reduce(
    array_keys($params),
    function ($acc, $key) use ($pdo, $params) {
      $value = $params[$key];
      if (is_array($value) && !empty($value)) {
        $in = array_map(function ($item) use ($pdo) {
          return $pdo->quote($item);
        }, $value);
        $joinedIn = implode(", ", $in);
        $acc[] = "$key IN ($joinedIn)";
      } else if (!is_array($value)) {
        $quotedValue = $pdo->quote($value);
        $acc[] = "$key = $quotedValue";
      }
      return $acc;
    },
    []
  );

  $sqlParts = [];
  $sqlParts[] = "SELECT id FROM users";
  if (!empty($whereParts)) {
    $sqlParts[] = "WHERE";
    $sqlParts[] = implode(" OR ", $whereParts);
  }
  $sqlParts[] = "ORDER BY id";
  $sql = implode(" ", $sqlParts);
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  return $stmt->fetchAll(\PDO::FETCH_COLUMN);
}
