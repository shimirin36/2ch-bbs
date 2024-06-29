<?php

include_once("../database/connect.php");
include("../../app/functions/thread_add.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規スレッド作成ページ</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
  <?php include("../parts/header.php"); ?>
  <?php include("../parts/validation.php"); ?>
  <div style="padding-left: 36px; color: blue">
    <h2 style="margin-top: 20px; margin-bottom: 0px">新規スレッド立ち上げるお（ ＾ω＾）</h2>
  </div>
  <form method="post" class="formWrapper">
    <div>
      <label>スレッド名</label>
      <input type="text" name="title">
      <label>名前</label>
      <input type="text" name="username">
    </div>
    <div>
      <textarea name="inputComment" class="commentTextArea"></textarea>
    </div>
    <input type="submit" value="立ち上げ" name="threadSubmitButton">
  </form>
</body>

</html>