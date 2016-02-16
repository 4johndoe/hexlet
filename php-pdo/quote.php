Query класс который предоставляет абстракцию поверх sql. Его главное достоинство это возможность строить динамические запросы без склеивания строк.

Пример использования:

$query = new Query($this->pdo, 'users');
$query = $query->where('from', 'github');
$query = $query->where('id', '3')->where('age', 21);

// SELECT * FROM users WHERE from = 'github' AND 'id' = 3 AND age = 21;
$query->toSql();

$query->all();

<?php
// function toSQL() {
//   $values = [3, 'user1'];
//   $data = implode(', ', array_map(function ($item) use ($pdo) {
//     return $pdo->quote($item);
//   }, $values));
//   $pdo->exec("INSERT INTO users VALUES ($data)");
// }
$sqlParts = [];
$sqlParts[] = "SELECT * FROM $this->table";
if ($this->where) {
  $where = implode(' AND ', array_map(function ($key, $value) {
    $quotedValue = $this->pdo->quote($value);
    return "$key = $quotedValue";
  }, array_keys($this->where), $this->where));
  $sqlParts[] = "WHERE $where";
}
return implode(' ', $sqlParts);
