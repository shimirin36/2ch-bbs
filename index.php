<?php

include_once("./app/database/connect.php");

if (isset($_POST["submitButton"])) {
  $username = $_POST["username"];
  var_dump($username);
  $comment = $_POST["inputComment"];
  var_dump($comment);
}

$comment_array = array();

// コメントデータを全件取得
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();

$comment_array = $statement;

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
  <header>
    <h1 class="title">２ちゃんねる掲示板</h1>
    <hr>
  </header>

  <!-- スレッドエリア -->
  <div class="threadWrapper">
    <div class="childWrapper">
      <div class="threadTitle">
        <span>【タイトル】</span>
        <h1>２ちゃんねる掲示板をつくってみたお（・ｖ・）</h1>
      </div>
      <section>
        <article>
          <?php foreach ($comment_array as $value) : ?>
            <div class="wrapper">
              <div class="nameArea">
                <span>名前：</span>
                <p class="username"><?php echo $value["user_name"] ?></p>
                <time>：<?php echo $value["post_date"] ?></time>
              </div>
              <p class="comment"><?php echo $value["body"] ?></p>
            </div>
          <?php endforeach ?>
        </article>
      </section>
      <form class="formWrapper" method="post">
        <div>
          <input type="submit" value="書き込む" name="submitButton">
          <label>名前：</label>
          <input type="text" name="username">
        </div>
        <div>
          <textarea class="commentTextArea" name="inputComment"></textarea>
        </div>
      </form>
    </div>
  </div>
</body>

</html>