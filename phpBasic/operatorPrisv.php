<?php

/* balance -= 100*/

function deposit(&$balance, $amount)
{
  $balance += $amount;
}

function newDeposit($balance)
{
  return function ($amount) use (&$balance)
  {
    $balance += $amount;
    return $balance;
  };
}
//Задание
// file: index.php
// Напишите функцию newWithdraw, которая снимает деньги со счета. При попытке снять больше денег чем есть на счете, она должна возвращать too much.
//
// Пример:
// $withdraw = newWithdraw(100);
// "too much" == $withdraw(1000);
// 50 == $withdraw(50);
// 5 == $withdraw(45);
