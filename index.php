<?php

include_once("./app/database/connect.php");
include("app/functions/comment_add.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>２ちゃんねる掲示板</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <?php include("app/parts/header.php"); ?>

  <?php include("app/parts/validation.php"); ?>

  <?php include("app/parts/thread.php"); ?>
</body>

</html>