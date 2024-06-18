<?php

include_once("./app/database/connect.php");

$error_msg = array();

if (isset($_POST["submitButton"])) {
  //名前のバリデーション
  if (empty($_POST["username"])) {
    $error_msg["username"] = "名前を入力してください";
  }
  //コメントのバリデーション
  if (empty($_POST["inputComment"])) {
    $error_msg["inputComment"] = "コメントを入力してください";
  }

  if (empty($error_msg)) {
    $post_date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `comment` (`user_name`, `body`, `post_date`) VALUES (:username, :inputComment, :post_date)";
    $statement = $pdo->prepare($sql);

    //値をセットする
    $statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
    $statement->bindParam(":inputComment", $_POST["inputComment"], PDO::PARAM_STR);
    $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);

    $statement->execute();
  }
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

  <!-- バリデーションチェックの出力 -->
  <?php if (isset($error_msg)) : ?>
    <ul class="errorMsg">
      <?php foreach ($error_msg as $error) : ?>
        <li><?php echo $error ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
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