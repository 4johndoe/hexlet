<?php


Реализуйте метод isCircular в классе Node, который определяет есть ли циклы в списке.

Пример:

    $last = new Node(8)
    $head = new Node(7, $last)
    $head = new Node(6, $head)

    $head.isCircular() == false
Пример:

    $last = Node(8)
    $head = Node(2, $last)
    $head = Node(1, $head)
    $last.setNext($head)

    $head.isCircular() == true
