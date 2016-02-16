<?php
$pdo = new \PDO();
// 
$stmt = $pdo->prepare("SELECT name FROM users WHERE role = ? AND name != ?");
$stmt->execute(['member', 'john']);
//
$stmt = $pdo->prepare("SELECT name FROM users WHERE role = :role");
$stmt->bindValue(':role', 'member', \PDO::PARAM_STR);
$stmt->execute();
