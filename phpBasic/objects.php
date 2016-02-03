<?php

function newAccount($balance)
{
  $withdraw = function ($amount) use (&$balance) {
    $balance -= $amount;
    return $balance;
  };

  $deposit = function ($amount) use (&$balance) {
    $balance += $amount;
    return $balance;
  };

  return function ($funcName, $amount) use ($withdraw, $deposit) {
    switch ($funcName) {
      case 'withdraw':
        return $withdraw($amount);
        break;
      case 'deposit':
        return $deposit($amount);
        break;
    }
  };
}

// file: index.php
// Измените функцию newAccount из видео так, чтобы она создавала счета, защищенные паролем.
//
// Пример:
//
// $acc = newAccount(100, "secret password");
// 110 == $acc("deposit", 10, "secret password");
// 60 == $acc("withdraw", 50, "secret password");
// "wrong password!" == $acc("deposit", 10, "wrong password");
