<!-- Пример использования: -->
$query = new Query($this->pdo, 'users');
$query = $query->where('from', 'github');
$query = $query->select('id', 'name');

$query->count() == sizeof($query->all());

$query->each(function ($row) {
    2 == sizeof($row); // cause select('id', 'name')
});
<!-- file: Query.php -->
Реализуйте метод count в соответствии с примером выше.
Реализуйте метод each в соответствии с примером выше.
<?php

function count()
{
  // BEGIN
  $query = $this->select('COUNT(*)');
  $stmt = $this->pdo->query($query->toSql());
  return $stmt->fetchColumn();
  // END
}

function each($func)
{
  // BEGIN
  $stmt = $this->pdo->query($this->toSql());
  array_map($func, $stmt->fetchAll(\PDO::FETCH_ASSOC));
  // END
}
