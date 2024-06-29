<?php
$error_msg = array();

if (isset($_POST["threadSubmitButton"])) {
  // スレッド名バリデーション
  if (empty($_POST["title"])) {
    $error_msg["title"] = "スレッド名を入力してください";
  } else {
    // エスケープ処理
    $escaped["title"] = htmlspecialchars($_POST["title"], ENT_QUOTES, "utf-8");
  }

  //名前のバリデーション
  if (empty($_POST["username"])) {
    $error_msg["username"] = "名前を入力してください";
  } else {
    // エスケープ処理
    $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "utf-8");
  }

  //コメントのバリデーション
  if (empty($_POST["inputComment"])) {
    $error_msg["inputComment"] = "コメントを入力してください";
  } else {
    // エスケープ処理
    $escaped["inputComment"] = htmlspecialchars($_POST["inputComment"], ENT_QUOTES, "utf-8");
  }

  if (empty($error_msg)) {
    $post_date = date("Y-m-d H:i:s");

    // スレッドを追加
    $sql = "INSERT INTO `thread` (`title`) VALUES (:title)";
    $statement = $pdo->prepare($sql);

    //値をセットする
    $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);

    // SQL実行
    $statement->execute();

    // コメントも追加
    $sql = "INSERT INTO comment (user_name, body, post_date, thread_id) 
    VALUES (:username, :inputComment, :post_date, (SELECT id FROM thread WHERE title = :title))";
    $statement = $pdo->prepare($sql);

    //値をセットする
    $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
    $statement->bindParam(":inputComment", $escaped["inputComment"], PDO::PARAM_STR);
    $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
    $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);

    $statement->execute();

    // 掲示板ページにリダイレクト
    header("Location: http://localhost:8080/2ch-bbs");
  }
}
