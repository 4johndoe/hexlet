<?php

/* balance -= 100*/

function deposit(&$balance, $amount)
{
  $balance += $amount;
}

function newDeposit($balance)
{
  return fucntion ($amount) use (&$balance)
  {
    $balance += $amount;
    return $balance;
  }
}
