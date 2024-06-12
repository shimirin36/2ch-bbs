<?php

$user = "root";
$pass = "root";

// DB接続
try {
  $pdo = new PDO('mysql:host=localhost;dbname=2ch-bbs', $user, $pass);
} catch (PDOException $error) {
  echo $error->getMessage();
}
