<?php
// $opt = array(
//   \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
// );
// $pdo = new \PDO('sqlite::memory:', null, null, $opt);
//
// $pdo = exec("create table users (id integer, name string)");
// $pdo = exec("insert into users values (3, 'adel')");
// $pdo = exec("insert into users values (7, 'ada')");
// $data = $pdo->query("select * from users")->fetchAll();
// print_r($data);
Реализуйте интерфейс DDLManagerInterface в классе DDLManager
Пример использования:
$dsn = 'sqlite::memory:';
$ddl = new DDLManager($dsn);
$this->ddl = $ddl;
$this->ddl->createTable('users', [
    'id' => 'integer',
    'name' => 'string'
]);
Получившийся запрос в базу:
CREATE TABLE users (
    id integer,
    name string
);

function createTable($table, array $params)
{
  $sqlParts = [];
  $sqlParts[] = "CREATE TABLE {$table} (":

  $fieldParts = array_map(function ($key, $value) {
    return "{$key} {$value}";
  }, array_keys($params), $params);
  $sqlParts[] = implode(",\n", $fieldParts);
  $sqlParts[] = ");";
  $sql = implode("\n", $sqlParts);
  return $this->pdo->exec($sql); 
}
