<?php
##
$builder = QueryBuilder::from('users');
$expected = 'SELECT * FROM users';
$this->assertEquals($expected, $builder->toSql());
##
$builder = QueryBuilder::from('photos')->select('age', 'name');
$expected = 'SELECT age, name FROM photos';
$this->assertEquals($expected, $builder->toSql());
##
function testWhere()
{
  $builder = QueryBuilder::from('users')
    ->where('age', '18')
    ->where('source', 'facebook');
  $expected = "SELECT * FROM users WHERE age = 18 AND source = 'facebook'";
  $this->assertEquals($expected, $builder->toSql());
}

function testWhereWithNull()
{
  $builder = QueryBuilder::from('users')
    ->where('email', null);
  $expected = 'SELECT * FROM users WHERE email IS NULL';
  $this->assertEquals($expected, $builder->toSql());
}
