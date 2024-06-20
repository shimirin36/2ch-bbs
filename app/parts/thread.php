<?php
include_once("./app/database/connect.php");
include("app/functions/comment_get.php");
?>
<!-- スレッドエリア -->
<div class="threadWrapper">
  <div class="childWrapper">
    <div class="threadTitle">
      <span>【タイトル】</span>
      <h1>２ちゃんねる掲示板をつくってみたお（・ｖ・）</h1>
    </div>
    <?php include("app/parts/commentSection.php"); ?>
    <?php include("app/parts/commentForm.php"); ?>
  </div>
</div>