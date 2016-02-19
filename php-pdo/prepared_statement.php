<?php
// $pdo = new \PDO();
// //
// $stmt = $pdo->prepare("SELECT name FROM users WHERE role = ? AND name != ?");
// $stmt->execute(['member', 'john']);
// // binder
// $stmt = $pdo->prepare("SELECT name FROM users WHERE role = :role");
// $stmt->bindValue(':role', 'member', \PDO::PARAM_STR);
// $stmt->execute();

$stmt = $this->pdo->prepare("INSERT INTO user_photos VALUES (?, ?)");

foreach ($user->getPhotos() as $photo) {
  $stmt->execute([$photo->getName(), $photo->getFilepath()]);
}
